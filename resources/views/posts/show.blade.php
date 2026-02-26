<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }} - Zeynep'in Bloğu</title>
    
    {{-- Fontlar ve Stiller --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    {{-- Laravel'in CSS ve JS dosyalarını çağırıyoruz --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-[#faf5ff]"> {{-- 👈 İŞTE SOFT LİLA RENGİMİZ BURADA --}}

    {{-- NAVİGASYON (Üst Menü) --}}
    <nav class="w-full py-6 px-6 md:px-12 flex justify-between items-center relative z-50">
        <a href="/" class="text-2xl font-serif font-bold text-gray-800 tracking-tighter hover:text-purple-700 transition">
            Zeynep.
        </a>

        <div class="flex items-center gap-4">
            @auth
                {{-- Giriş Yapmışsa: BAHÇEM Butonu --}}
                <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-full font-bold text-sm hover:bg-emerald-700 transition shadow-lg shadow-emerald-200 flex items-center gap-2">
                    <span>🌱</span> Bahçem
                </a>
            @else
                {{-- Giriş Yapmamışsa: Giriş/Kayıt --}}
                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-purple-700 transition">Giriş</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-gray-900 text-white rounded-full text-sm font-bold hover:bg-purple-600 transition shadow-lg">Kayıt Ol</a>
            @endauth
        </div>
    </nav>

    {{-- OKUMA İLERLEME ÇUBUĞU (Opsiyonel Component) --}}
    @if (isset($slot)) 
        <x-reading-progress />
    @endif

    {{-- ANA İÇERİK ALANI --}}
    <main class="pt-10 pb-24 px-6">
        
        {{-- Makale Kartı (Beyaz Zemin) --}}
        <article class="max-w-4xl mx-auto bg-white rounded-[2.5rem] shadow-xl shadow-purple-100 overflow-hidden relative">
            
            {{-- Header Kısmı --}}
            <header class="pt-16 pb-10 text-center px-6 relative bg-gradient-to-b from-purple-50/50 to-white">
                <div class="max-w-3xl mx-auto space-y-6">
                    <div class="flex items-center justify-center gap-4 text-sm">
                        {{-- Kategori Etiketi --}}
                        <span class="px-4 py-1.5 bg-purple-100 text-purple-800 rounded-full font-bold tracking-wide text-xs uppercase border border-purple-200">
                            {{ $post->category->name ?? 'Genel' }}
                        </span>
                        <span class="text-gray-400 font-serif italic">{{ $post->created_at->format('d M Y') }}</span>
                    </div>

                    {{-- Başlık --}}
                    <h1 class="font-serif text-4xl md:text-5xl text-gray-900 leading-tight font-bold">
                        {{ $post->title }}
                    </h1>

                    <div class="flex items-center justify-center gap-2 pt-2 text-sm text-gray-500">
                        <span>Yazar: <strong class="text-gray-800">Zeynep</strong></span>
                    </div>
                </div>
            </header>

            {{-- Yazı İçeriği --}}
            <div class="px-8 md:px-16 pb-16">
                <div class="prose prose-lg prose-purple max-w-none text-gray-700 leading-loose">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

        </article>

        {{-- ETKİLEŞİM ALANI (Yorumlar ve Çiçek Ekme) --}}
        <div class="max-w-4xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- 1. ÇİÇEK EKME KARTI --}}
            <div class="p-8 bg-white rounded-3xl shadow-lg shadow-purple-50 border border-purple-100 text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 rounded-full blur-3xl opacity-60 -mr-10 -mt-10"></div>
                
                <h3 class="text-xl font-bold text-gray-900 mb-2 relative z-10">Okumayı Bitirdin mi?</h3>
                <p class="text-gray-500 text-sm mb-6 relative z-10">Bu yazıyı tamamladıysan bahçene yeni bir çiçek ekebilirsin.</p>

                @auth
                    @if(auth()->user()->hasRead($post))
                        <button disabled class="w-full py-3 bg-gray-50 border border-gray-200 text-gray-400 font-bold rounded-xl cursor-not-allowed">
                            ✅ Zaten Eklendi
                        </button>
                    @else
                        <form action="{{ route('posts.markAsRead', $post) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full group relative flex items-center justify-center gap-2 py-3 bg-emerald-500 text-white font-bold rounded-xl hover:bg-emerald-600 transition-all shadow-md shadow-emerald-200 hover:-translate-y-1">
                                <span>Çiçeği Ek</span>
                                <span class="text-xl group-hover:rotate-12 transition-transform">🌻</span>
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block w-full py-3 border-2 border-purple-200 text-purple-700 font-bold rounded-xl hover:bg-purple-50 transition text-center">
                        Giriş Yap
                    </a>
                @endauth
            </div>

            {{-- 2. YORUM YAPMA KARTI --}}
            <div class="p-8 bg-white rounded-3xl shadow-lg shadow-purple-50 border border-purple-100">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span>💬</span> Yorum Yap
                </h3>

                <form action="{{ route('comments.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-500 focus:ring-2 focus:ring-purple-100 outline-none transition text-sm" placeholder="Adınız...">
                    
                    <textarea name="body" rows="3" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-500 focus:ring-2 focus:ring-purple-100 outline-none transition text-sm resize-none" placeholder="Düşünceleriniz..."></textarea>
                    
                    <button type="submit" class="w-full py-3 bg-gray-900 text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg">
                        Gönder
                    </button>
                </form>
            </div>

        </div>

        {{-- MEVCUT YORUMLAR --}}
        @if($comments->count() > 0)
            <div class="max-w-4xl mx-auto mt-12">
                <h3 class="font-serif text-2xl text-gray-800 mb-6 px-2">Gelen Yorumlar</h3>
                <div class="space-y-4">
                    @foreach ($comments as $comment)
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <div class="flex justify-between items-baseline mb-2">
                                <h4 class="font-bold text-gray-900">{{ $comment->name }}</h4>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-600 leading-relaxed">{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </main>

</body>
</html>