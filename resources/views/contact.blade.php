<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>İletişim | Zeynep'in Dijital Bahçesi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-gray-900 bg-gradient-to-br from-soft-lilac via-white to-warm-stone min-h-screen">

<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-gray-800 text-white px-3 py-2 rounded-md z-50">
    Ana İçeriğe Atla
</a>

<header class="p-6">
    <nav aria-label="Ana Navigasyon">
        <a href="/" class="font-bold">Ana Sayfa</a>
    </nav>
</header>

<main id="main-content" class="max-w-2xl mx-auto py-20 px-6">

    <h1 class="text-4xl font-serif mb-10">İletişim</h1>

    <form action="#" method="POST" class="space-y-6">

        <!-- İsim -->
        <div>
            <label for="name" class="block font-medium mb-2">
                Ad Soyad
            </label>
            <input 
                type="text"
                id="name"
                name="name"
                required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-400"
            >
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block font-medium mb-2">
                E-posta
            </label>
            <input 
                type="email"
                id="email"
                name="email"
                required
                aria-describedby="emailHelp"
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-400"
            >
            <p id="emailHelp" class="text-sm text-gray-500 mt-1">
                Size dönüş yapabilmem için gereklidir.
            </p>
        </div>

        <!-- Mesaj -->
        <div>
            <label for="message" class="block font-medium mb-2">
                Mesajınız
            </label>
            <textarea
                id="message"
                name="message"
                rows="5"
                required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-400"
            ></textarea>
        </div>

        <!-- Gönder -->
        <div>
            <button 
                type="submit"
                class="px-6 py-3 bg-deep-mauve text-white rounded-full hover:opacity-90 transition"
            >
                Gönder
            </button>
        </div>

    </form>

</main>

</body>
</html>