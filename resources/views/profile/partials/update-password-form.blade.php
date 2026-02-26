<section>
    <header>
        <h2 class="text-lg font-serif font-bold text-gray-900">
            {{ __('Şifre Değişikliği') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Hesap güvenliğiniz için lütfen uzun ve karmaşık bir şifre kullanın.") }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- MEVCUT ŞİFRE --}}
        <div>
            <x-input-label for="current_password" :value="__('Mevcut Şifre')" class="font-serif text-gray-700" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-200 focus:border-latte focus:ring-latte rounded-xl" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        {{-- YENİ ŞİFRE --}}
        <div>
            <x-input-label for="password" :value="__('Yeni Şifre')" class="font-serif text-gray-700" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full border-gray-200 focus:border-latte focus:ring-latte rounded-xl" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        {{-- ŞİFRE TEKRAR --}}
        <div>
            <x-input-label for="password_confirmation" :value="__('Yeni Şifre (Tekrar)')" class="font-serif text-gray-700" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-200 focus:border-latte focus:ring-latte rounded-xl" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-charcoal hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-serif tracking-wide shadow-md">
                {{ __('Güncelle') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 font-bold"
                >{{ __('Şifreniz Değiştirildi. 🔒') }}</p>
            @endif
        </div>
    </form>
</section>