<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zeynep'in Dijital Bahçesi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Figtree:wght@300;400;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-charcoal bg-paper-white selection:bg-lavender selection:text-deep-mauve">
    
    <nav class="fixed top-0 w-full z-50 transition-all duration-300 bg-paper-white/80 backdrop-blur-md border-b border-gray-100/50 supports-[backdrop-filter]:bg-paper-white/60">
        <div class="max-w-6xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="/" class="group flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-br from-deep-mauve to-warm-brown rounded-lg flex items-center justify-center text-white font-serif font-bold text-xl shadow-md group-hover:shadow-deep-mauve/40 transition-all">
                    Z
                </div>
                <span class="text-charcoal font-serif text-lg tracking-wide group-hover:text-deep-mauve transition-colors">
                    Zeynep.
                </span>
            </a>

            <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-500">
                <a href="#" class="hover:text-deep-mauve transition-colors relative group py-2">
                    Blog
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-deep-mauve transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" class="hover:text-deep-mauve transition-colors relative group py-2">
                    Araştırmalar
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-deep-mauve transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" class="hover:text-deep-mauve transition-colors relative group py-2">
                    Hakkımda
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-deep-mauve transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
            
            <button class="md:hidden text-charcoal hover:text-deep-mauve transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </nav>

    <main class="pt-20"> {{ $slot }}
    </main>

    <footer class="text-center py-12 text-gray-400 text-sm mt-12 border-t border-gray-100">
        <p>&copy; {{ date('Y') }} Dijital Bahçe. Sevgiyle kodlandı.</p>
    </footer>
    <x-reading-progress />
</body>
</html>