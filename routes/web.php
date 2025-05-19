<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Models\Message;

Route::get('/', function () {
    $messages = Message::all();
    return view('home', compact('messages')); //quick fix
});
Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);
