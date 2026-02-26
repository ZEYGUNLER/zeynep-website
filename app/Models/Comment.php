<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 👇 TEK VE GEÇERLİ OLAN BU OLMALI
    protected $fillable = [
        'post_id', // ✅ Bu sayede artık hata vermeyecek
        'name', 
        'body', 
        'is_approved'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}