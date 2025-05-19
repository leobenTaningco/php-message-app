@foreach ($messages as $message)
    @include('partials.message', ['message' => $message])
@endforeach

//temporary