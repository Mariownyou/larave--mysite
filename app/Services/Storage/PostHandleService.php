<?php

namespace App\Services\Storage;

use App\Models\Tag;
use Illuminate\Support\Str;

class PostHandleService {
    function createTags($post, $tags) {
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

    function addTags($post, $tags) {
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
}
