<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all(); 
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request){
        Message::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
        ]);
        return redirect()->back();
    }

}
