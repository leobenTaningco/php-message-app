@extends ('layouts.app')

@section('title', 'Home')

@section('content')
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
@endsection