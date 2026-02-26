<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Zeynep') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|playfair-display:400,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    {{-- 
        🎨 RENK PALETİ (Kullanıcının Seçimi):
        - Ana Arka Plan: #BEB8AC (Koza 1949 - Sıcak Taş Rengi)
        - Kart Arka Planı: #EDEDE9 (Çok Açık Taş Rengi)
    --}}
    
    {{-- 👇 1. DEĞİŞİKLİK: Ana arka plan rengi #BEB8AC yapıldı --}}
    <body class="font-sans text-gray-900 antialiased bg-[#BEB8AC]">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            
            {{-- LOGO ALANI --}}
            <div class="mb-8 text-center">
                <a href="/" class="inline-block group">
                    <h1 class="font-serif text-5xl font-bold text-gray-800 tracking-tighter drop-shadow-sm group-hover:text-stone-700 transition duration-300">
                        Zeynep.
                    </h1>
                </a>
            </div>

            {{-- FORM KARTI --}}
            {{-- 👇 2. DEĞİŞİKLİK: Kartın arka plan rengi #EDEDE9 yapıldı --}}
            <div class="w-full sm:max-w-md px-8 py-10 bg-[#EDEDE9] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.15)] sm:rounded-[2rem] border border-stone-300/50 relative overflow-hidden">
                
                {{-- Kartın tepesindeki ince dekoratif ışık efekti --}}
                <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/70 to-transparent"></div>

                {{-- Form İçeriği --}}
                {{ $slot }}
                
            </div>

            {{-- ALT BİLGİ --}}
            <div class="mt-8 text-center text-sm text-stone-600 font-medium">
                &copy; {{ date('Y') }} Zeynep'in Bloğu.
            </div>
        </div>
    </body>
</html>