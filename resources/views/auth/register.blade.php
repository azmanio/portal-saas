<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('No WhatsApp')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Institution Name -->
        <div class="mt-4">
            <x-input-label for="institution_name" :value="__('Nama Institusi')" />
            <x-text-input id="institution_name" class="block mt-1 w-full" type="text" name="institution_name"
                :value="old('institution_name')" required autofocus autocomplete="institution_name" />
            <x-input-error :messages="$errors->get('institution_name')" class="mt-2" />
        </div>

        <!-- Legality No -->
        <div class="mt-4">
            <x-input-label for="legality_no" :value="__('No Legalitas')" />
            <x-text-input id="legality_no" class="block mt-1 w-full" type="text" name="legality_no"
                :value="old('legality_no')" required autofocus autocomplete="legality_no" />
            <x-input-error :messages="$errors->get('legality_no')" class="mt-2" />
        </div>

        <!-- Institution Type -->
        <div class="mt-4">
            <x-input-label for="institution_type" :value="__('Tipe Institusi')" />

            <div class="flex flex-column grid gap-4 mt-2 text-white">
                <!-- Radio Button 1 -->
                <div>
                    <label for="laz">
                        <input id="laz" type="radio" name="institution_type" value="laz" class="mr-2"
                            {{ old('institution_type') == 'laz' ? 'checked' : '' }} required>
                        {{ __('LAZ') }}
                    </label>
                </div>
                <!-- Radio Button 2 -->
                <div>
                    <label for="ngo">
                        <input id="ngo" type="radio" name="institution_type" value="ngo" class="mr-2"
                            {{ old('institution_type') == 'ngo' ? 'checked' : '' }} required>
                        {{ __('NGO') }}
                    </label>
                </div>
            </div>
            <x-input-error :messages="$errors->get('institution_type')" class="mt-2" />
        </div>


        <!-- Core Program -->
        <div class="mt-4">
            <x-input-label for="core_program" :value="__('Core Program')" />
            <x-text-input id="core_program" class="block mt-1 w-full" type="text" name="core_program"
                :value="old('core_program')" required autofocus autocomplete="core_program" />
            <x-input-error :messages="$errors->get('core_program')" class="mt-2" />
        </div>

        <!-- Employee Qty -->
        <div class="mt-4">
            <x-input-label for="employee_qty" :value="__('Jumlah Karyawan')" />
            <x-text-input id="employee_qty" class="block mt-1 w-full" type="text" name="employee_qty"
                :value="old('employee_qty')" required autofocus autocomplete="employee_qty" />
            <x-input-error :messages="$errors->get('employee_qty')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
