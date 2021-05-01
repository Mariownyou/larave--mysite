<?php

namespace App\Http\Controllers;

use App\Models\MathPost;
use Illuminate\Http\Request;
use App\Services\Storage\PostHandleService;

class MathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = MathPost::all();

        return view('school.math.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.math.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $text = $request->input('content');
        $files = $request->input('images');
        $tags = $request->input('tags');

        $post = new MathPost();
        $post->title = $request->input('title');
        $post->type = $request->input('type');
        $post->type = 'n';
        if (($text and $files) or $text) {
            $post->text = $text;
        }
        $post->save();

        if($tags) {
            app(PostHandleService::class)->createTags($post, $tags);
        }

        if ($request->hasfile('files')) {
            $images = $request->file('files');
            $fileArr = [];

            foreach($images as $image) {
                $path = $image->store('public/math/img', 'public');
                $obj = ["type" => 'i', "path" => $path];
                array_push($fileArr, $obj);
            }

            $post->files = $fileArr;
        }

        $post->save();
        dd($post->tags(), $post->files, $request);
        return back()->with('success', 'Images uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = MathPost::find($id);
        $post->views += 1;
        $post->save();

        return view('school.math.show')->with('post', $post);
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
