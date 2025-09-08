<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all(); 
        return view('messages.index', data: compact('messages'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'content'=> 'required|max:200',
            'color'=> 'required',
        ], [
            'content.required' => 'Please enter a message.',
            'content.max' => 'Message cannot exceed 200 characters.',
            'color.required' => 'Please select a color.',
        ]);

        $validated['user_id'] = auth()->id();
        
        Message::create($validated);
        return redirect()->back()->with('success', 'Message added!');
    }

    public function destroy(Message $message){
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted!');
    }

}
