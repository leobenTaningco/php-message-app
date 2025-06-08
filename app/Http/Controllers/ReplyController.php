<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index(){
        $replies = Reply::all();
        return view('replies.index', compact('replies'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'message_id' => 'required|exists:messages,id',
            'content' => 'required|max:100',
            'color' => 'required',
        ],[
            'message_id.required' => 'Please select a message to reply to.',
            'content.required' => 'Please enter a reply.',
            'content.max' => 'Reply cannot exceed 100 characters.',
            'color.required' => 'Please select a color.',
        ]);

        Reply::create($validated);
        return redirect()->back()->with('success', 'Reply added!');
    }
    
    public function destroy(Reply $reply){
        $reply->delete();
        return redirect()->back();
    }
}