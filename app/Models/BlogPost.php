<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'published'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
