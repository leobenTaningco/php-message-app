@extends ('layouts.app')

@section('title', 'Home')

@section('content')
    @include('messageDisplay.message-display')
    @include('partials.floating-icon')
    @include('messageModals.message-form-modal')
    @include('messageModals.drawings-form-modal')

    <script>
        function openForm() {
            document.getElementById('messageFormModal').classList.remove('hidden')
        }

        function closeForm() {
            document.getElementById('messageFormModal').classList.add('hidden')
        }
    </script>
@endsection