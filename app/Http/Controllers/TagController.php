<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('blog.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|unique:tags|max:200',
            'slug' => 'required|unique:tags|max:200',
        ]);

        $slug = Str::slug($request->input('slug'), "-");

        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->slug = $slug;
        $tag->favorite = $request->input('favorite');
        $tag->navbar = $request->input('navbar');

        // Save Tag
        $tag->save();

        return redirect()->route('tags.show', $tag->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('blog.tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('blog.tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $valid = $request->validate([
            'name' => 'required|unique:tags|max:200',
            'slug' => 'required|unique:tags|max:200',
        ]);

        $slug = Str::slug($request->input('slug'), "-");

        $tag->name = $request->input('name');
        $tag->slug = $slug;
        $tag->favorite = $request->input('favorite');
        $tag->navbar = $request->input('navbar');

        // Save Tag
        $tag->save();

        return redirect()->route('tags.show', $tag->slug);
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
