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
        ]);
        
        Message::create($validated);
        return redirect()->back();
    }

    public function destroy(Message $message){
        $message->delete();
        return redirect()->back();
    }

}
