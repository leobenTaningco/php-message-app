<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\Drawing;
use App\Models\Reply;
use App\Models\User;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $messages = Message::all();
    $replies = Reply::all();

    return view('home-guest', compact('messages', 'replies'));
});

Route::get('/dashboard', function () {
    $messages = Message::all();
    $replies = Reply::all();
    $user = Auth::user();
    
    if(auth()->check()){
        return view('home', compact('messages', 'replies', 'user'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('messages', MessageController::class);
Route::resource('drawings', DrawingController::class);
Route::resource('replies', ReplyController::class);

require __DIR__.'/auth.php';