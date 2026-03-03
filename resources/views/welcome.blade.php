<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    {{-- ADIM 2: Viewport kontrolü (Föy Sayfa 3) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zeynep'in Dijital Bahçesi</title>

    {{-- Fontlar --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|playfair-display:400,700&display=swap" rel="stylesheet" />

    {{-- Stil ve Scriptler --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-gray-900">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-gray-800 text-white px-3 py-2 rounded-md z-50">
        Ana İçeriğe Atla
    </a>

    <div class="min-h-screen relative isolate bg-gradient-to-br from-soft-lilac via-white to-warm-stone">
        
        <div class="fixed inset-0 bg-noise pointer-events-none z-50 opacity-20 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-purple-100 rounded-full blur-3xl opacity-40 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] bg-stone-100 rounded-full blur-3xl opacity-60"></div>

        {{-- ADIM 3: Flexbox ile Navigasyon (Föy Sayfa 14) --}}
        {{-- 'flex-wrap' ekleyerek küçük ekranlarda logoyu ve menüyü alt alta güvenli şekilde düşürürüz --}}
       <header class="fixed top-0 left-0 w-full z-50 p-6 md:px-12 bg-white/30 backdrop-blur-md border-b border-white/20">
    <nav aria-label="Ana Navigasyon" class="max-w-7xl mx-auto flex items-center justify-between">
        
        {{-- SOL: Logo --}}
        <a href="/" class="text-2xl font-serif font-bold text-gray-800 tracking-tighter hover:text-purple-700 transition">
            Zeynep.
        </a>

        {{-- SAĞ: İletişim + Butonlar (Flex ile Gruplanmış) --}}
        <div class="flex items-center gap-6">
            {{-- İletişim Bağlantısı --}}
            <a href="#iletisim-bolumu" class="text-sm font-bold text-gray-600 hover:text-purple-700 transition">
                İletişim
            </a>

            @auth
                {{-- Giriş yapmış kullanıcı butonları --}}
                <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-full font-bold text-sm hover:bg-emerald-700 transition">
                    Bahçem
                </a>
            @else
                {{-- Misafir kullanıcı butonları --}}
                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-gray-900 transition">Giriş Yap</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-gray-800 text-white rounded-full text-sm font-bold hover:bg-gray-700 transition shadow-md">Kayıt Ol</a>
            @endauth
        </div>
    </nav>
</header>

        @php
            $styles = [
                0 => [ 'line' => 'bg-mint', 'badge' => 'bg-mint/20 text-charcoal' ],
                1 => [ 'line' => 'bg-honey', 'badge' => 'bg-honey/20 text-charcoal' ],
                2 => [ 'line' => 'bg-sky', 'badge' => 'bg-sky/20 text-charcoal' ],
                3 => [ 'line' => 'bg-warm-brown', 'badge' => 'bg-warm-brown/20 text-warm-brown' ],
            ];
        @endphp

        <main id="main-content" class="relative z-10 pt-32 md:pt-40">
            
            {{-- Hero Section --}}
            <section class="min-h-[60vh] flex flex-col justify-center items-center text-center px-4">
                <div class="space-y-8 max-w-2xl animate-fade-in">
                    <span class="inline-block py-1.5 px-4 rounded-full bg-white/60 border border-gray-200 backdrop-blur-sm text-[10px] md:text-xs font-bold tracking-[0.2em] text-deep-mauve uppercase shadow-sm">
                        Kişisel Blog & Araştırma Notları
                    </span>
                    
                    {{-- Fluid Typography (clamp benzeri Tailwind sınıfları) --}}
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl text-charcoal leading-tight">
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

            {{-- ADIM 4: CSS Grid ile Kart Düzeni (Föy Sayfa 17) --}}
            <section id="posts-area" class="max-w-6xl mx-auto px-6 pb-24">
                
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="font-serif text-3xl text-charcoal italic">Son Yeşerenler</h2>
                    <div class="h-px bg-gradient-to-r from-gray-300 to-transparent flex-1"></div>
                </div>

                {{-- 'columns' yerine 'grid' yapısına geçildi. --}}
                {{-- Mobilde 1, Tablette 2, Masaüstünde 3 sütun (grid-cols-1 md:grid-cols-2 lg:grid-cols-3) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        @php
                            $style = $styles[$loop->index % 4]; 
                            $readTime = ceil(str_word_count(strip_tags($post->content)) / 200);
                        @endphp

                        <article class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 border border-white hover:border-purple-100 flex flex-col relative overflow-hidden">
                            
                            <div class="absolute top-0 left-0 w-full h-1.5 {{ $style['line'] }} opacity-80"></div>

                            <div class="flex justify-between items-center mb-5 mt-2">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase {{ $style['badge'] }}">
                                    {{ $post->category->name ?? 'GENEL' }}
                                </span>
                                <span class="text-gray-400 text-xs font-serif italic">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                            </div>

                            <h3 class="font-serif text-2xl text-charcoal mb-3 leading-snug group-hover:text-deep-mauve transition-colors duration-300">
                                <a href="{{ route('posts.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6 font-light">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>

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
            {{-- İletişim Bölümü (Anasayfa üzerinde) --}}
<section id="iletisim-bolumu" class="max-w-5xl mx-auto px-6 py-24 scroll-mt-24">
    <div class="bg-white/90 backdrop-blur-md rounded-[2.5rem] p-8 md:p-16 shadow-2xl border border-white">
        
        <div class="flex flex-col md:flex-row gap-12">
            
            <div class="md:w-1/3 space-y-6">
                <h2 class="font-serif text-4xl text-charcoal leading-tight">
                    Bir kahve <br> <span class="italic text-deep-mauve">eşliğinde</span> <br> konuşalım mı?
                </h2>
                <p class="text-gray-500 font-light leading-relaxed">
                    Projeleriniz, sorularınız veya sadece merhaba demek için formdaki tüm alanları doldurarak bana ulaşabilirsiniz.
                </p>
                <div class="pt-4 space-y-3">
                    <p class="text-sm font-bold text-charcoal">📍 İstanbul, Türkiye</p>
                    <p class="text-sm font-bold text-charcoal">📧 merhaba@zeynep.com</p>
                </div>
            </div>

            <div class="md:w-2/3">
                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    @csrf
                    
                    <div class="flex flex-col gap-2">
                        <label for="full_name" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Adınız Soyadınız *</label>
                        <input type="text" id="full_name" name="full_name" required 
                               class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-100 focus:bg-white focus:border-deep-mauve focus:ring-4 focus:ring-deep-mauve/5 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">E-Posta Adresiniz *</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-100 focus:bg-white focus:border-deep-mauve focus:ring-4 focus:ring-deep-mauve/5 transition-all outline-none">
                    </div>

                    <div class="flex flex-col md:col-span-2 gap-2">
                        <label for="subject" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Konu</label>
                        <select id="subject" name="subject" 
                                class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-100 focus:bg-white focus:border-deep-mauve transition-all outline-none appearance-none">
                            <option value="genel">Genel Merhaba</option>
                            <option value="is-birligi">İş Birliği</option>
                            <option value="proje">Proje Teklifi</option>
                        </select>
                    </div>

                    <div class="flex flex-col md:col-span-2 gap-2">
                        <label for="message" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Mesajınız *</label>
                        <textarea id="message" name="message" rows="5" required 
                                  class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-100 focus:bg-white focus:border-deep-mauve focus:ring-4 focus:ring-deep-mauve/5 transition-all outline-none resize-none"></textarea>
                    </div>

                    <div class="md:col-span-2 pt-2">
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-charcoal text-white rounded-full font-bold hover:bg-deep-mauve transition-all shadow-xl shadow-charcoal/10 hover:shadow-deep-mauve/20 active:scale-95">
                            Mesajı Gönder
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
        </main>
    </div>
</body>
</html>