<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all(); 
        return view('messages.index', data: compact('messages'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=> 'required|max:15',
            'content'=> 'required|max:200',
            'color'=> 'required',
        ], [
            'name.required' => 'Please enter your name.',
            'name.max' => 'Name cannot be longer than 15 characters.',
            'content.required' => 'Please enter a message.',
            'content.max' => 'Message cannot exceed 200 characters.',
            'color.required' => 'Please select a color.',
        ]);
        
        Message::create($validated);
        return redirect()->back()->with('success', 'Message added!');
    }

    public function destroy(Message $message){
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted!');
    }

}
