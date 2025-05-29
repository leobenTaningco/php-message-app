<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\Drawing;
use App\Models\Reply;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\ReplyController;

Route::get('/', function () {
    $messages = Message::all();
    $replies = Reply::all();
    return view('home', compact('messages', 'replies')); //temporary update later
});
Route::get('admin', function(){
    $messages = Message::all();
    return view('admin', compact('messages'));
});

Route::resource('messages', MessageController::class);
Route::resource('drawings', DrawingController::class);
Route::resource('replies', ReplyController::class);
Route::get('/drawings-json', function() {
    return response()->json(Drawing::pluck('content'));
});
