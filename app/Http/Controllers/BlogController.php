<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit','update', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::where('published', true)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('blog.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            // The user is logged in...
            return view('blog.posts.create');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //checking if request  is set
        $valid = $request->validate([
            'title' => 'required|min:4|max:200',
            'content' => 'required',
        ]);

        $content=$request->input('content');
        $title = $request->input('title');
        $slug = Str::slug($title, "-");

        // check_tags
        if(BlogPost::where('slug', $slug)->first()) {
            $slug = $slug.'-'.now()->format('Y-m-d-H');
        }

        //identify img element
//        $content = $this->parseText($content);

        // creating Post instance
        $post = new BlogPost();
        $post->title = $title;
        $post->content = $content;
        $post->slug = $slug;
        $post->private_id = sha1(time());
        $post->save();

        // cretaing tags
        $tags = $request->input('tags');
        if($tags) {
            $this->createTags($post, $tags);
        }

        // saving Post instance
        $post->save();

        return redirect()->route('blog.drafts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        return view('blog.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        return view('blog.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $post)
    {
        //checking if request  is set
        $valid = $request->validate([
            'title' => 'required|min:4|max:200',
            'content' => 'required',
        ]);

        $content=$request->input('content');
        $title = $request->input('title');
        $slug = Str::slug($title, "-");

        // check_slug
        $model = BlogPost::where('slug', $slug)->first();
        if($model) {
            if ($model == $post) {
            } else {
                $slug = $slug.'-'.now()->format('Y-m-d-H');
            }
        }

        //identify img element
//        $content = $this->parseText($content);

        // creating Post instance
        $post->title = $title;
        $post->content = $content;
        $post->slug = $slug;
        $post->save();

        // cretaing tags
        $tags = $request->input('tags');
        if($tags) {
            $this->addTags($post, $tags);
        }

        // saving Post instance
        $post->save();

        return redirect()->route('blog.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        dd($post);
        $post->delete();

        return redirect()->route('blog.posts.index');
    }

    public function delete(Request $request) {
        dump($request);
        $id = $request->id;
        $post = BlogPost::find($id);
        $post->delete();
        return response(['status' => 'OK', 'post_id' => $post->id, 'action' => 'deleted'], 200);
    }

    public function publish(Request $request) {
        $id = $request->id;
        $post = BlogPost::find($id);
        $post->published = true;
        $post->save();
        return response(['status' => 'OK', 'post_id' => $post->id, 'post_pub' => $post->published], 200);
    }

    public function private($id) {
        $post = BlogPost::where('private_id', $id)->first();
        return view('blog.posts.preview')->with('post', $post);
    }

    private function createTags($post, $tags) {
        $post->tags()->detach();
        $tags = array_unique($tags); // To make sure that all tags are unique

        foreach ($tags as $tag) {
            $model = Tag::where('name', $tag)->first();

            if ($model) {
                $post->tags()->attach($model->id);
            } else {
                $slug = Str::slug($tag, "-");
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $new_tag->slug = $slug;
                $new_tag->save();
                $post->tags()->attach($new_tag->id);
            }
        }
    }

    // TODO отрефакторить и убрать лишнюю функцию
    private function addTags($post, $tags) {
        $post->tags()->detach();
        $tags = array_unique($tags); // To make sure that all tags are unique
        $post_tags = $post->tags;

        foreach ($tags as $tag) {
            $model = Tag::where('name', $tag)->first();

            if ($model) {
                if (!$post_tags->contains($model)) {
                    $post->tags()->attach($model->id);
                }
            } else {
                $slug = Str::slug($tag, "-");
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $new_tag->slug = $slug;
                $new_tag->save();
                $post->tags()->attach($new_tag->id);
            }
        }
    }

    private static function para ($regs) {
        $line = $regs[1];
        $trimmed = trim ($line);
        if (preg_match ('/^<\/?(ul|ol|li|h|p|bl)/', $trimmed)) {
            return "\n" . $line . "\n";
        }
        return sprintf ("\n<p>%s</p>\n", $trimmed);
    }

    private static function ul_list ($regs) {
        $item = $regs[1];
        return sprintf ("\n<ul>\n\t<li>%s</li>\n</ul>", trim ($item));
    }

    private static function ol_list ($regs) {
        $item = $regs[1];
        return sprintf ("\n<ol>\n\t<li>%s</li>\n</ol>", trim ($item));
    }

    private static function blockquote ($regs) {
        $item = $regs[2];
        return sprintf ("\n<blockquote>%s</blockquote>", trim ($item));
    }

    private static function header ($regs) {
        list ($tmp, $chars, $header) = $regs;
        $level = strlen ($chars);
        return sprintf ('<h%d>%s</h%d>', $level, trim ($header), $level);
    }

    public static function parseText($content) {
        $rules = array (
            '/(#+)(.*)/' => 'self::header',                           // headers
            '/\[([^\[]+)\]\(([^\)]+)\)/' => '<a href=\'\2\'>\1</a>',  // links
            '/(\*\*|__)(.*?)\1/' => '<strong>\2</strong>',            // bold
            '/(\*|_)(.*?)\1/' => '<em>\2</em>',                       // emphasis
            '/\~\~(.*?)\~\~/' => '<del>\1</del>',                     // del
//            '/\"(.*[a-zA-Z])\"/' => '<q>\1</q>',                      // quote
            '/(?:"([^>]*)")(?!>)/' => '«\1»',                           // quote
            '/`(.*?)`/' => '<code>\1</code>',                         // inline code
            '/\n\*(.*)/' => 'self::ul_list',                          // ul lists
            '/\n[0-9]+\.(.*)/' => 'self::ol_list',                    // ol lists
            '/\n(&gt;|\>)(.*)/' => 'self::blockquote',                // blockquotes
            '/\n-{5,}/' => "\n<hr />",                                // horizontal rule
            '/(.+?)(\r|$)+/' => 'self::para',                         // add paragraphs
            '/<\/ul>\s?<ul>/' => '',                                  // fix extra ul
            '/<\/ol>\s?<ol>/' => '',                                  // fix extra ol
            '/<\/blockquote><blockquote>/' => "\n"                    // fix extra blockquote
        );
        $text = $content;
        foreach ($rules as $regex => $replacement) {
            if (is_callable ( $replacement)) {
                $text = preg_replace_callback ($regex, $replacement, $text);
            } else {
                $text = preg_replace ($regex, $replacement, $text);
            }
        }

        $text=preg_replace_callback(
            '#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u',
            function ($matches) {
                if (count($matches)===3) return "«»";
                else if ($matches[1]) return str_replace('"',"«",$matches[1]);
                else return str_replace('"',"»",$matches[4]);
            },
            $text
        );
//        dd($text);
		return trim ($text);
    }
}
