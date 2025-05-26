<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\Drawing;
use App\Http\Controllers\DrawingController;

Route::get('/', function () {
    $messages = Message::all();
    return view('home', compact('messages')); //quick fix
});
Route::get('admin', function(){
    $drawings = Drawing::all();
    return view('admin', compact('drawings'));
});

Route::resource('messages', MessageController::class);
Route::resource('drawings', DrawingController::class);
Route::get('/drawings-json', function() {
    return response()->json(Drawing::pluck('content'));
});
