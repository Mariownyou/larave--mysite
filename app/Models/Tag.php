<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'favorite', 'navbar'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->morphedByMany(BlogPost::class, 'taggable');
    }

    public function mathPosts()
    {
        return $this->morphedByMany(MathPost::class, 'taggable');
    }
}
