{{-- resources/views/home.blade.php --}}
<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <a href="{{ route('profile.edit') }}">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}" 
                class="w-12 h-12 rounded-full border border-gray-300 dark:border-gray-600">
            </a>  

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>

          <div class="flex items-center space-x-4">
              <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 17h5l-1.405-1.405C18.21 14.79 18 14.42 18 14v-3a6 6 0 00-5-5.916V5a2 2 0 10-4 0v.084A6 6 0 004 11v3c0 .42-.21.79-.595 1.595L2 17h5m8 0a3 3 0 11-6 0h6z"/>
                </svg> 
              </a>  

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-600 dark:text-gray-300 hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                    </svg>
                </button>
            </form>
          </div>
      </div>
    </x-slot>

    @include('messageDisplay.message-display')
    @include('partials.floating-icon')
    @include('messageModals.message-form-modal')
    @include('messageModals.drawings-form-modal')

    @if (session('success'))
        <div class="fixed bottom-5 left-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="fixed bottom-5 left-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        setTimeout(() => {
            document.querySelectorAll('.fixed.bottom-5.left-5').forEach(el => {
                el.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => el.remove(), 500);
            });
        }, 3000);

        function openForm() {
            document.getElementById('messageFormModal').classList.remove('hidden')
        }

        function closeForm() {
            document.getElementById('messageFormModal').classList.add('hidden')
        }
    </script>
</x-app-layout>
