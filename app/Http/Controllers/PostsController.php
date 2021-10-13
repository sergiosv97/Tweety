<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index-post',[
            'posts' => auth()->user()
        ]);
    }
    
    public function store()
    {
        Log::info(request('title'));
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file' 
            
        ]);
        
        
        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'description' => request('description')   
        ]);
        
        return redirect()->route('home');
        
    }
    
}
