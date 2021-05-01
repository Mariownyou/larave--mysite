<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathPost extends Model
{
    use HasFactory;

//    public $files = [
//        'files' => 'array'
//    ];

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
