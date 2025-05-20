<div class="flex flex-row w-full h-100">
    @foreach ($messages as $message)
        @include('partials.message', ['message' => $message]) <!temporary>
    @endforeach
</div>