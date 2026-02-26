<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostProgressController extends Controller
{
    // Okundu Olarak İşaretle
    public function markAsRead(Post $post)
    {
        // 1. Zaten okuduysa tekrar ekleme yapmayalım (Çift çiçek olmasın)
        if (!$post->readers()->where('user_id', Auth::id())->exists()) {
            
            // 2. İlişkiyi veritabanına kaydet (attach: bağla demek)
            $post->readers()->attach(Auth::id());
        }

        // 3. Kullanıcıyı tebrik ederek bahçesine gönder
        return redirect()->route('dashboard')->with('success', 'Harika! Bir çiçek daha ektin. 🌱');
    }
}