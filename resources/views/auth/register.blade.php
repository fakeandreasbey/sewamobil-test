<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

   
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" onkeypress="validateNama(event)" maxlength="50"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="name" :value="__('No. Telp')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required autofocus autocomplete="no_telp"  onkeypress="validateNoTelp(event)" maxlength="15"/>
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <div class="mt-4">        
            <x-input-label for="name" :value="__('No. SIM')" />
            <x-text-input id="no_sim" class="block mt-1 w-full" type="text" name="no_sim" :value="old('no_sim')" required autofocus autocomplete="no_sim"  onkeypress="validateNoSIM(event)" maxlength="20"/>
            <x-input-error :messages="$errors->get('no_sim')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="name" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


<script>
        function validateNama(event) {
            var key = event.key;

            // Validasi hanya huruf (A-Z atau a-z) atau spasi
            var isLetterOrSpace = /^[A-Za-z\s]+$/.test(key);

            if (!isLetterOrSpace) {
                event.preventDefault();
            }
        }

        function validateNoTelp(event) {
            var key = event.key;
            var isDigit = /\d/.test(key);

            if (!isDigit) {
                // Jangan izinkan input karakter selain angka
                event.preventDefault();
            }
        }

        function validateNoSIM(event) {
            var key = event.key;
            var isDigitOrDash = /[0-9-]/.test(key);

            if (!isDigitOrDash) {
                // Jangan izinkan input karakter selain angka dan '-'
                event.preventDefault();
            }
        }
</script>
