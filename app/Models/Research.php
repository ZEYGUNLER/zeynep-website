<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = [
        'title', 
        'slug', 
        'summary', 
        'content', 
        'file_path', 
        'image', 
        'is_published'
    ];
}
