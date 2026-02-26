<section class="space-y-6">
    <header>
        <h2 class="text-lg font-serif font-bold text-gray-900">
            {{ __('Hesabı Tamamen Sil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Hesabınızı sildiğinizde, tüm verileriniz ve yazılarınız kalıcı olarak yok edilecektir. Lütfen işlemi onaylamadan önce saklamak istediğiniz verileri indirin.") }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-500 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-bold shadow-sm"
    >
        {{ __('Hesabımı Sil') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-serif font-bold text-gray-900">
                {{ __('Hesabınızı silmek istediğinize emin misiniz?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Bu işlem geri alınamaz. Onaylamak için lütfen şifrenizi girin.") }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500"
                    placeholder="{{ __('Şifreniz') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Vazgeç') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-red-600 hover:bg-red-800">
                    {{ __('Evet, Hesabı Sil') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>