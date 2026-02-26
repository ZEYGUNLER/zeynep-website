<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // 1. Gelen verileri doğrula (Validation)
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id', // 👈 İŞTE EKSİK OLAN KISIM BUYDU!
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // 2. Yorumu veritabanına kaydet
        // (Artık $validated dizisinin içinde post_id olduğu için hata vermeyecek)
        Comment::create($validated);

        // 3. Kullanıcıyı sayfaya geri gönder
        return back()->with('success', 'Yorumunuz başarıyla gönderildi! 🚀');
    }
}