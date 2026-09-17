<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'category', 'rack', 'stock', 
        'cover_image_url', 'rating', 'popularity_score'
    ];
}
