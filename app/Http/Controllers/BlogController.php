<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();


        return view('blog.index')->with('posts', $posts);
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
            return view('blog.create');
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
            'text' => 'required',
        ]);

        $content=$request->input('text');

        //Prepare HTML & ignore HTML errors
        $dom = new \domdocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $content, LIBXML_NOWARNING | LIBXML_NOERROR);

        //identify img element
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
        // final variable to store in DB
        $content = $dom->savehtml();


        // creating Post instance
        $post = new BlogPost();
        $post->title = $request->input('title');
        $post->content = $content;
        $post->save();

        // cretaing tags
        $tags = $request->input('tags');
        foreach ($tags as $tag) {
            $model = Tag::where('name', $tag)->first();

            if ($model)
            {
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

        // saving Post instance
        $post->save();

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
