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
        ]);

        Reply::create($validated);
        return redirect()->back();
    }
    
    public function destroy(Reply $reply){
        $reply->delete();
        return redirect()->back();
    }
}