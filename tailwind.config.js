import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', 'Merriweather', ...defaultTheme.fontFamily.serif], // Senin fontların
            },
            colors: {
                // Mevcut renklerin dursun, bunları ekle:
                'soft-lilac': '#FAF5FF',  // Anasayfa açık lila
                'warm-stone': '#F5F5F4',  // Anasayfa açık taş
                'dusty-rose': '#D4B2A7',  // Profil vurgu rengi (Gül kurusu)
                'latte': '#A38F85',       // Profil metin/başlık rengi (Kahve tonu)
                'deep-stone': '#CDC6C3',  // Profil detay rengi (Koyu taş)
                
                // Eski renklerin (charcoal, mint vs.) burada durabilir
                'charcoal': '#2D3748',
                'mint': '#C6F6D5',
                'deep-mauve': '#6B46C1',
                // ...
            }
        },
    },

    plugins: [forms],
};