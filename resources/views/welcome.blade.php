<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zeynep'in Dijital Bahçesi</title>

    {{-- Fontlar --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|playfair-display:400,700&display=swap" rel="stylesheet" />

    {{-- Stil ve Scriptler --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-gray-900">

    {{-- 
      🌈 ARKA PLAN GEÇİŞİ BURADA
      soft-lilac -> white -> warm-stone geçişi tüm sayfayı kapsar.
    --}}
    <div class="min-h-screen relative isolate bg-gradient-to-br from-soft-lilac via-white to-warm-stone">
        
        {{-- Dekoratif Işık/Flu Efektleri --}}
        <div class="fixed inset-0 bg-noise pointer-events-none z-50 opacity-20 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-purple-100 rounded-full blur-3xl opacity-40 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] bg-stone-100 rounded-full blur-3xl opacity-60"></div>

        {{-- NAVİGASYON (Üst Menü) --}}
       <nav class="absolute top-0 left-0 w-full z-50 p-6 md:px-12 flex justify-between items-center">
    
    {{-- Sol: Logo --}}
    <a href="/" class="text-2xl font-serif font-bold text-gray-800 tracking-tighter hover:text-purple-700 transition">
        Zeynep.
    </a>

    {{-- Sağ: Menü Butonları --}}
    <div class="flex items-center gap-4">
        @auth
            {{-- GİRİŞ YAPMIŞ KULLANICI İÇİN --}}
            
            {{-- 1. Profil Linki --}}
            <a href="{{ route('profile.edit') }}" class="hidden md:inline-block text-sm font-bold text-gray-600 hover:text-purple-700 transition">
                Profilim
            </a>

            {{-- 2. Çıkış Yap Butonu (Form ile olmak zorunda) --}}
            <form method="POST" action="{{ route('logout') }}" class="hidden md:inline-block">
                @csrf
                <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-600 transition">
                    Çıkış
                </button>
            </form>

            {{-- 3. Bahçem Butonu (En dikkat çekici olan) --}}
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-full font-bold text-sm hover:bg-emerald-700 transition shadow-lg shadow-emerald-200 flex items-center gap-2">
                <span>🌱</span> Bahçem
            </a>

        @else
            {{-- MİSAFİR KULLANICI İÇİN --}}
            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-gray-900 transition">Giriş Yap</a>
            <a href="{{ route('register') }}" class="px-5 py-2.5 bg-gray-800 text-white rounded-full text-sm font-bold hover:bg-gray-700 transition shadow-md">Kayıt Ol</a>
        @endauth
    </div>
</nav>

        {{-- KART RENKLERİ MANTIĞI --}}
        @php
            $styles = [
                0 => [ 'line' => 'bg-mint', 'badge' => 'bg-mint/20 text-charcoal' ],
                1 => [ 'line' => 'bg-honey', 'badge' => 'bg-honey/20 text-charcoal' ],
                2 => [ 'line' => 'bg-sky', 'badge' => 'bg-sky/20 text-charcoal' ],
                3 => [ 'line' => 'bg-warm-brown', 'badge' => 'bg-warm-brown/20 text-warm-brown' ],
            ];
        @endphp

        {{-- ANA İÇERİK --}}
        <main class="relative z-10 pt-20">
            
            {{-- HERO SECTION (Başlık Alanı) --}}
            <section class="min-h-[60vh] flex flex-col justify-center items-center text-center px-4">
                <div class="space-y-8 max-w-2xl animate-fade-in">
                    
                    <span class="inline-block py-1.5 px-4 rounded-full bg-white/60 border border-gray-200 backdrop-blur-sm text-[10px] md:text-xs font-bold tracking-[0.2em] text-deep-mauve uppercase shadow-sm">
                        Kişisel Blog & Araştırma Notları
                    </span>
                    
                    <h1 class="font-serif text-5xl md:text-7xl text-charcoal leading-tight drop-shadow-sm">
                        <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-deep-mauve to-latte">Dijital bahçeme</span> <br>
                        hoşgeldiniz.
                    </h1>

                    <p class="text-lg md:text-xl text-gray-600 font-light max-w-lg mx-auto leading-relaxed">
                        Burada fikir tohumları ekiyor, araştırma notlarımı yeşertiyor ve öğrendiklerimi paylaşıyorum.
                    </p>

                    <div class="pt-6">
                        <a href="#posts-area" class="inline-block px-8 py-3 bg-charcoal text-white rounded-full hover:bg-deep-mauve transition-all duration-300 shadow-lg shadow-charcoal/20 hover:shadow-deep-mauve/30 hover:-translate-y-1">
                            Okumaya Başla
                        </a>
                    </div>
                </div>
            </section>

            {{-- YAZILAR ALANI (Grid) --}}
            <section id="posts-area" class="max-w-6xl mx-auto px-6 pb-24">
                
                {{-- Bölüm Başlığı --}}
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="font-serif text-3xl text-charcoal italic">Son Yeşerenler</h2>
                    <div class="h-px bg-gradient-to-r from-gray-300 to-transparent flex-1"></div>
                </div>

                {{-- Yazı Kartları --}}
                <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
                    @foreach($posts as $post)
                        @php
                            $style = $styles[$loop->index % 4]; 
                            // Okuma süresi hesaplama
                            $readTime = ceil(str_word_count(strip_tags($post->content)) / 200);
                        @endphp

                        <article class="break-inside-avoid group bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgba(0,0,0,0.1)] transition-all duration-500 border border-white hover:border-purple-100 hover:-translate-y-1 relative overflow-hidden inline-block w-full">
                            
                            {{-- Renkli Üst Çizgi --}}
                            <div class="absolute top-0 left-0 w-full h-1.5 {{ $style['line'] }} opacity-80"></div>

                            {{-- Kategori ve Tarih --}}
                            <div class="flex justify-between items-center mb-5 mt-2">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase {{ $style['badge'] }}">
                                    {{ $post->category->name ?? 'GENEL' }}
                                </span>
                                <span class="text-gray-400 text-xs font-serif italic">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                            </div>

                            {{-- Başlık --}}
                            <h3 class="font-serif text-2xl text-charcoal mb-3 leading-snug group-hover:text-deep-mauve transition-colors duration-300">
                                <a href="{{ route('posts.show', $post) }}">
                                    <span class="bg-gradient-to-r from-deep-mauve/0 to-deep-mauve/0 bg-[length:0%_2px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 group-hover:bg-[length:100%_2px] pb-1">
                                        {{ $post->title }}
                                    </span>
                                </a>
                            </h3>

                            {{-- Özet --}}
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 font-light">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>

                            {{-- Alt Bilgi --}}
                            <div class="flex items-center justify-between border-t border-gray-50 pt-4 mt-auto">
                                <span class="text-xs text-gray-400 font-medium flex items-center gap-1">
                                    ⏱ {{ $readTime }} dk okuma
                                </span>
                                
                                <a href="{{ route('posts.show', $post) }}" class="text-deep-mauve text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                                    Oku <span class="text-lg leading-none">→</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

        </main>
    </div>
</body>
</html>