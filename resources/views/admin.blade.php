@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="flex flex-row w-full h-100">
        @foreach ($messages as $message)
            <div class="flex w-75 h-75 bg-amber-50 p-3 m-3">
                {{ $loop->iteration }}. {{ $message->content }} from: {{ $message->name }}
                <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 bottom-1 right-1 bg-amber-200 p-3 m-10">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
