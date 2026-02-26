<x-app-layout>
    {{-- Üst Başlık --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                {{-- Başlık Rengi: LATTE (#A38F85) --}}
                <h2 class="font-serif text-3xl font-bold text-latte leading-tight tracking-tight">
                    {{ __('Profil Ayarları') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1 font-medium">Bahçedeki kimliğin ve güvenlik tercihlerin.</p>
            </div>
            
            {{-- İkon Rengi: DUSTY ROSE (#D4B2A7) --}}
            <div class="hidden md:flex w-12 h-12 bg-white text-dusty-rose rounded-2xl items-center justify-center text-2xl shadow-sm border border-stone-100">
                ✨
            </div>
        </div>
    </x-slot>

    {{-- Ana İçerik Alanı --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- 1. KART: KİŞİSEL BİLGİLER --}}
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="md:w-1/3 pt-4">
                    {{-- Sol taraftaki şık çizgi (Dusty Rose) --}}
                    <h3 class="text-xl font-bold text-gray-800 font-serif border-l-4 border-dusty-rose pl-3">
                        Kişisel Bilgiler
                    </h3>
                    <p class="mt-2 text-sm text-gray-500 leading-relaxed pl-4">
                        Burada ismini ve e-posta adresini güncelleyebilirsin.
                    </p>
                </div>
                <div class="md:w-2/3 p-8 bg-white shadow-[0_10px_40px_-15px_rgba(163,143,133,0.15)] sm:rounded-[2rem] border border-white">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Ayırıcı --}}
            <div class="border-t border-stone-300/30 mx-4"></div>

            {{-- 2. KART: GÜVENLİK --}}
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="md:w-1/3 pt-4">
                    {{-- Sol taraftaki şık çizgi (Latte) --}}
                    <h3 class="text-xl font-bold text-gray-800 font-serif border-l-4 border-latte pl-3">
                        Güvenlik Anahtarı
                    </h3>
                    <p class="mt-2 text-sm text-gray-500 leading-relaxed pl-4">
                        Hesabının güvenliği için güçlü bir şifre kullanmanı öneririz.
                    </p>
                </div>
                <div class="md:w-2/3 p-8 bg-white shadow-[0_10px_40px_-15px_rgba(163,143,133,0.15)] sm:rounded-[2rem] border border-white">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            
            {{-- Ayırıcı --}}
            <div class="border-t border-stone-300/30 mx-4"></div>

            {{-- 3. KART: SİLME --}}
             <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="md:w-1/3 pt-4">
                    <h3 class="text-xl font-bold text-red-400 font-serif border-l-4 border-red-200 pl-3">
                        Hesabı Kapat
                    </h3>
                    <p class="mt-2 text-sm text-gray-500 leading-relaxed pl-4">
                         Bu işlem geri alınamaz.
                    </p>
                </div>
                <div class="md:w-2/3 p-8 bg-red-50/30 shadow-sm sm:rounded-[2rem] border border-red-50">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>