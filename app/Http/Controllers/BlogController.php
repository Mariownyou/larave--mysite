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

        //Prepare HTML & ignore HTML errors
        $dom = new \domdocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $content, LIBXML_NOWARNING | LIBXML_NOERROR);

        //identify img element
        $this->downloadImages($dom);

        // final variable to store in DB
        $content = $dom->savehtml();

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

        //Prepare HTML & ignore HTML errors
        $dom = new \domdocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $content, LIBXML_NOWARNING | LIBXML_NOERROR);

        //identify img element
        $this->downloadImages($dom);

        // final variable to store in DB
        $content = $dom->savehtml();

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
        // To make sure that all tags are unique
        $post->tags = array_unique(array($post->tags));
    }

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

    private function downloadImages($dom) {
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 source data (src) and save them to folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img) {
            //collect img source data
            $data = $img->getattribute('src');

            //checking if img source data is image by detecting 'data:image' in string
            if (strpos($data, 'data:image') !== false) {
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                //decode base64
                $data = base64_decode($data);

                //naming image file
                $image_name = time() . rand(000, 999) . $k . '.png';

                // image path (path) to use upload file to
                $path = 'img/posts/' . $image_name;

                //image path (path2) to save to DB so that summernote can display image in edit mode (When editing summernote content) NB: the difference btwn path and path2 is the forward slash "/" in path2
                $path2 = '/img/posts/' . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $path2);
            }
        }
    }
}
