@extends ('layouts.app')

@section('title', 'Home')

@section('content')
    @include('messages.index')
    @include('partials.floating-icon')
    @include('partials.message-form-modal')
    
    <script>
        function openForm() {
            document.getElementById('messageFormModal').classList.remove('hidden')
        }

        function closeForm() {
            document.getElementById('messageFormModal').classList.add('hidden')
        }
    </script>
@endsection