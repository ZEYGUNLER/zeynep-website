<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
                🌿 <span class="text-emerald-900">Dijital Bahçem</span>
            </h2>
            <div class="px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-bold border border-emerald-200">
                Premium v5.2
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#ecfdf5] min-h-screen relative overflow-hidden">
        
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-300 rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            {{-- VERİTABANI BAĞLANTISI (Düzeltildi) --}}
            @php
                // 1. Toplam Yazı Sayısı
                $totalPosts = \App\Models\Post::count(); 
                
                // 2. KULLANICININ OKUDUĞU YAZI SAYISI (Artık 0 değil, gerçek veri!)
                $readPosts = Auth::user()->postsRead()->count();

                // 3. İlerleme Yüzdesi
                $progress = $totalPosts > 0 ? round(($readPosts / $totalPosts) * 100) : 0;
                
                // 4. Çiçek Türleri
                $flowers = ['🌻', '🌹', '🌷', '🪷', '🌺', '🌸', '🌼', '💐'];
            @endphp

            {{-- İLERLEME KARTI --}}
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl mb-10 border-l-8 border-emerald-600">
                <div class="p-8 relative">
                    <div class="absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-emerald-50 to-transparent opacity-50"></div>

                    <div class="flex flex-col md:flex-row justify-between items-end mb-6 relative z-10">
                        <div>
                            <h3 class="text-3xl font-bold text-emerald-950">Hoş geldin, {{ Auth::user()->name }}! 🎩</h3>
                            <p class="text-emerald-700/80 mt-2 font-medium">Bahçendeki gelişim harika görünüyor.</p>
                        </div>
                        <div class="text-right">
                            <div class="inline-block bg-emerald-900 text-white px-4 py-2 rounded-lg shadow-md">
                                <span class="text-3xl font-bold">{{ $readPosts }}</span>
                                <span class="text-emerald-200 text-lg">/{{ $totalPosts }}</span>
                            </div>
                            <p class="text-[10px] text-emerald-800 uppercase tracking-widest font-bold mt-2">Koleksiyon</p>
                        </div>
                    </div>

                    <div class="relative w-full bg-emerald-100 rounded-full h-4 overflow-hidden shadow-inner border border-emerald-200">
                        <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-emerald-500 to-emerald-800 rounded-full transition-all duration-1000 ease-out shadow-lg" style="width: {{ $progress }}%">
                            <div class="w-full h-full bg-white/20 animate-pulse"></div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-2 text-xs font-semibold text-emerald-800">
                        <span>Başlangıç Seviyesi</span>
                        <span>%{{ $progress }} Tamamlandı</span>
                    </div>
                </div>
            </div>

            {{-- BAHÇE IZGARASI --}}
            <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 overflow-hidden">
                
                <div class="bg-emerald-900 p-6 flex justify-between items-center shadow-md">
                    <h3 class="text-emerald-50 font-bold text-lg flex items-center gap-2">
                        <span>🌻</span> Çiçek Koleksiyonu
                    </h3>
                    <span class="text-xs text-emerald-300 bg-emerald-950/50 px-3 py-1 rounded-full border border-emerald-800">
                        {{ $totalPosts }} Slot Mevcut
                    </span>
                </div>

                <div class="p-10 bg-gradient-to-b from-emerald-50/50 to-white">
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-x-8 gap-y-12">
                        
                        @for ($i = 1; $i <= $totalPosts; $i++)
                            <div class="flex flex-col items-center group">
                                
                                @if($i <= $readPosts) 
                                    {{-- ✅ DOLU / OKUNMUŞ --}}
                                    @php $randomFlower = $flowers[$i % count($flowers)]; @endphp

                                    <div class="relative cursor-pointer transition-all duration-500 hover:-translate-y-2">
                                        <div class="absolute inset-0 bg-emerald-200 rounded-full blur-xl opacity-0 group-hover:opacity-60 transition-opacity duration-500"></div>
                                        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-emerald-100 shadow-[0_10px_20px_rgba(16,185,129,0.15)] z-10 relative group-hover:border-emerald-300 transition-colors">
                                            <span class="text-5xl filter drop-shadow-sm">{{ $randomFlower }}</span>
                                        </div>
                                        <div class="mt-3 text-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                            <span class="text-xs font-bold text-emerald-800 bg-emerald-100 px-2 py-1 rounded text-nowrap">Yazı #{{ $i }}</span>
                                        </div>
                                    </div>
                                
                                @else
                                    {{-- ⭕ BOŞ / OKUNMAMIŞ --}}
                                    <div class="relative group cursor-pointer">
                                        <div class="w-24 h-24 rounded-full flex flex-col items-center justify-center
                                                    bg-[#f0fdf4] border-2 border-dashed border-emerald-300
                                                    transition-all duration-300 group-hover:bg-emerald-100 group-hover:border-solid group-hover:border-emerald-500">
                                            <span class="text-2xl opacity-30 group-hover:opacity-100 transition duration-300 grayscale group-hover:grayscale-0">🌱</span>
                                            <span class="text-[9px] font-bold text-emerald-300 uppercase mt-1 opacity-50 group-hover:text-emerald-700 group-hover:opacity-100">Boş</span>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-7 h-7 bg-white rounded-full flex items-center justify-center text-xs font-bold text-emerald-300 shadow-sm border border-emerald-100 group-hover:text-white group-hover:bg-emerald-500 transition-colors">
                                            {{ $i }}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endfor

                        @if($totalPosts == 0)
                            <div class="col-span-full text-center py-10 text-gray-400">
                                <p>Henüz hiç yazı eklenmemiş. Admin panelinden yazı ekleyince burada çukurlar oluşacak! 🌱</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-xs text-emerald-700/60 font-medium">
                    © 2024 Zeynep'in Bahçesi &bull; Okudukça Yeşeren Bir Dünya
                </p>
            </div>

        </div>
    </div>
</x-app-layout>