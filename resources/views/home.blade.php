@extends ('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full h-100">
        @foreach ($messages as $message)
            @include('partials.message', ['message' => $message]) <!temporary>
        @endforeach
    </div>
@endsection