<div 
    id="reading-progress-container" 
    class="fixed bottom-5 right-5 z-50 flex items-center justify-center w-12 h-12 bg-white rounded-full shadow-lg border border-gray-200 transition-all duration-300 transform translate-y-20 opacity-0"
    style="transition: all 0.5s ease;"
>
    <svg class="absolute w-full h-full transform -rotate-90" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb" stroke-width="4" />
        <circle id="progress-circle" cx="50" cy="50" r="45" fill="none" stroke="#10b981" stroke-width="4" stroke-dasharray="283" stroke-dashoffset="283" class="transition-all duration-100" />
    </svg>

    <svg id="icon-seed" class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
        <circle cx="12" cy="12" r="3" />
    </svg>

    <svg id="icon-sprout" class="hidden w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
         <path d="M2,12h2c0-3.31,2.69-6,6-6h1v6c0,2.21,1.79,4,4,4s4-1.79,4-4V4h1c3.31,0,6,2.69,6,6h2 c0-4.42-3.58-8-8-8h-1V1c0-0.55-0.45-1-1-1h-2c-0.55,0-1,0.45-1,1v1h-1C5.58,2,2,5.58,2,12z"/>
    </svg>

    <svg id="icon-flower" class="hidden w-7 h-7 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12,2c-1.1,0-2,0.9-2,2c0,0.74,0.4,1.38,1,1.72V6c-1.66,0-3,1.34-3,3c0,0.38,0.07,0.74,0.19,1.07 C7.86,10.03,7.45,10,7,10c-1.66,0-3,1.34-3,3c0,1.66,1.34,3,3,3c0.45,0,0.86-0.12,1.23-0.32c-0.08,0.26-0.13,0.54-0.13,0.82 c0,1.66,1.34,3,3,3c1.66,0,3-1.34,3-3c0-0.28-0.05-0.56-0.13-0.82C14.14,15.88,14.55,16,15,16c1.66,0,3-1.34,3-3c0-1.66-1.34-3-3-3 c-0.45,0-0.86,0.03-1.19,0.07C13.93,9.74,14,9.38,14,9c0-1.66-1.34-3-3-3V5.72C11.6,5.38,12,4.74,12,4C12,2.9,11.1,2,12,2z"/>
        <circle cx="12" cy="12" r="2.5" class="text-yellow-400" />
    </svg>
</div>

<script>
    document.addEventListener('scroll', function() {
        let scrollTop = window.scrollY;
        let docHeight = document.body.offsetHeight;
        let winHeight = window.innerHeight;
        let scrollPercent = scrollTop / (docHeight - winHeight);
        
        const container = document.getElementById('reading-progress-container');
        const circle = document.getElementById('progress-circle');
        const seed = document.getElementById('icon-seed');
        const sprout = document.getElementById('icon-sprout');
        const flower = document.getElementById('icon-flower');

        // Çember dolumu
        let dashOffset = 283 - (283 * scrollPercent);
        if (circle) circle.style.strokeDashoffset = dashOffset;

        // Kapsayıcı görünürlüğü
        if (scrollTop > 100) {
            container.classList.remove('translate-y-20', 'opacity-0');
        } else {
            container.classList.add('translate-y-20', 'opacity-0');
        }

        // İkon değiştirme mantığı
        seed.classList.add('hidden');
        sprout.classList.add('hidden');
        flower.classList.add('hidden');

        if (scrollPercent < 0.33) {
            seed.classList.remove('hidden');
        } else if (scrollPercent < 0.66) {
            sprout.classList.remove('hidden');
        } else {
            flower.classList.remove('hidden');
        }
    });
</script>