<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Models\Message;

Route::get('/', function () {
    $messages = Message::all();
    return view('home', compact('messages')); //quick fix
});
Route::get('admin', function(){
    $messages = Message::all();
    return view('admin', compact('messages'));
});

Route::resource('messages', MessageController::class);
