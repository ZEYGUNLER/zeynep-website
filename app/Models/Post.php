<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Post extends Model
{
    
    protected $fillable = [
        'category_id', 
        'title', 
        'slug', 
        'locale', 
        'content', 
        'image', 
        'is_published', 
        'published_at'
    ];
    // Post modelinin içine eklenecek:
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Bir yazının birden fazla okuyucusu olabilir
    public function readers()
    {
        return $this->belongsToMany(User::class, 'post_user');
    }
    // Bir yazının (Post) birden çok Yorumu (Comment) olabilir.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
