<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use Illuminate\Http\Request;

class DrawingController extends Controller
{
    public function index(){
        $drawings = Drawing::all(); 
        return view('drawings.index', data: compact('drawings'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'content'=> 'required',
        ]);
        
        Drawing::create($validated);
        return redirect()->back();
    }
}