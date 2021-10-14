<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Log;
use DB;
use Auth;


class PostsController extends Controller
{
    public function show(User $user)
    {
        
        return view('posts.show-post',[
            'user' => $user,
            'posts' => $user
                ->posts(),
        ]);
    }

    public function index()
    {
         $user = auth()->user();
         $posts = $user->posts()->get();
         
        return view('posts.index-post',[
            'posts' => $posts
        ]);
    }
    
    public function store()
    {
        
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file' 
            
        ]);
        
        
        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'description' => request('description'),
            'file' => request('file')
        ]);
        
        return redirect()->route('home');
        
    }

    public function edit(User $user, Request $request)
    {
        //$this->authorize('edit', $user);

        return view('posts.edit-post', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes =  request()->validate([
            'title' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
                'description' => ['string', 'required'],
                'file' => ['file'],
                
        ]);

        $archivo = $request->file('avatar');
        $filename =time().'.'.$request->file('avatar')->extension();
        $archivo->move(public_path('uploads'), $filename);

        $user->avatar = $filename;
        $user->save();

        return back()
            ->with('success','You have successfully upload file.');


        
    }
    
}
