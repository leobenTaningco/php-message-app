<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-col items-center gap-4 m-4">
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <div class="flex flex-col items-center">
                <img id="profile_picture_preview" src="{{'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}"
                    alt="Profile Picture"
                    class="w-20 h-20 rounded-full border border-gray-300 dark:border-gray-600 object-cover">

                <input id="profile_picture" 
                    name="profile_picture" 
                    type="file" 
                    accept="image/*"
                    class="block w-full text-sm text-gray-600 dark:text-gray-400 
                            file:mr-4 file:py-2 file:px-4 
                            file:rounded-md file:border-0 
                            file:text-sm file:font-semibold 
                            file:bg-indigo-50 file:text-indigo-700 
                            hover:file:bg-indigo-100"
                            onchange="document.getElementById('profile_picture_preview').src = window.URL.createObjectURL(this.files[0])">
                <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />

            </div>
        </div>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email not required, fill only if you want password resets')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" value="" autocomplete="off"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" autocomplete="off" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="off" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="off" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 cursor-pointer">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
