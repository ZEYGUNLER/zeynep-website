<section>
    <header>
        <h2 class="text-lg font-serif font-bold text-gray-900">
            {{ __('Hesap Bilgileri') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Hesabınızın profil bilgilerini ve e-posta adresini buradan güncelleyebilirsiniz.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- İSİM ALANI --}}
        <div>
            <x-input-label for="name" :value="__('Ad Soyad')" class="font-serif text-gray-700" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-200 focus:border-dusty-rose focus:ring-dusty-rose rounded-xl" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- E-POSTA ALANI --}}
        <div>
            <x-input-label for="email" :value="__('E-posta Adresi')" class="font-serif text-gray-700" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-gray-200 focus:border-dusty-rose focus:ring-dusty-rose rounded-xl" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        {{ __('E-posta adresiniz doğrulanmamış.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Doğrulama e-postasını tekrar göndermek için tıklayın.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Yeni bir doğrulama bağlantısı e-posta adresinize gönderildi.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- KAYDET BUTONU --}}
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-charcoal hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-serif tracking-wide shadow-md">
                {{ __('Kaydet') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 font-bold"
                >{{ __('Bilgiler Kaydedildi. ✅') }}</p>
            @endif
        </div>
    </form>
</section>