<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;      // ✅ Yorumlar için
use App\Http\Controllers\PostProgressController; // ✅ Çiçek ekmek için
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// 1. ANASAYFA (Yazıları Listeleme)
Route::get('/', function () {
    // Yayınlanmış yazıları, en yeniden eskiye doğru çek
    $posts = Post::where('is_published', true)->latest()->take(6)->get();
    return view('welcome', compact('posts'));
});

// 2. DASHBOARD (Bahçe)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. KULLANICI PROFİL İŞLEMLERİ (Breeze Standart)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. YORUM YAPMA ROTASI (Eksik olan buydu!) 🚨
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// 5. OKUMA TAMAMLAMA (Çiçek Ekmek) ROTASI 🌻
Route::post('/posts/{post}/read', [PostProgressController::class, 'markAsRead'])
    ->middleware(['auth'])
    ->name('posts.markAsRead');

// 6. YAZI DETAY SAYFASI
// (En alta koyuyoruz ki diğer özel rotalarla karışmasın)
Route::get('/posts/{post}', function (Post $post) {
    // Yazının detayını ve onaylanmış yorumları gönder
    $comments = $post->comments()->where('is_approved', true)->latest()->get();
    
    return view('posts.show', compact('post', 'comments'));
})->name('posts.show');

require __DIR__.'/auth.php';