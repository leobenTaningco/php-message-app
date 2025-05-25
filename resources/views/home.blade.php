@extends ('layouts.app')

@section('title', 'Home')

@section('content')
    @include('messages.index')
    @include('partials.floating-icon')
    @include('partials.message-form-modal')
    @include('messages.drawings')
    <button
    onclick="document.getElementById('drawings').classList.contains('hidden')? openDrawingsForm() : closeDrawingsForm()"
    class="fixed bottom-4 right-50 z-51 bg-red-500 text-white rounded-full p-4 shadow-lg hover:bg-blue-700 transition-all cursor-pointer"
    >
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
    </svg>
    </button>
    <script>
        function openForm() {
            document.getElementById('messageFormModal').classList.remove('hidden')
        }

        function closeForm() {
            document.getElementById('messageFormModal').classList.add('hidden')
        }
    </script>
@endsection