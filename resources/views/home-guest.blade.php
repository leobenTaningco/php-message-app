<x-guest-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600 dark:text-gray-200" />

            <div class="flex space-x-3">
                <a href="{{ route('login') }}"
                class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-100 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white transition">
                    Register
                </a>
            </div>
        </div>
    </x-slot>

    <div class="">
        @include('messageDisplay.message-display-guest')
    </div>
</x-guest-layout>
