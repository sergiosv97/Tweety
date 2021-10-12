<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show',[
            'user' => $user,
            'tweets' => $user
                ->tweets()
                ->withLikes()
                ->paginate(50),
        ]);
    }

    public function edit(User $user, Request $request)
    {
        //$this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        //dd(request('avatar'));
        $attributes =  request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
                'name' => ['string', 'required', 'max:255'],
                'avatar' => ['file'],
                'email' => [
                    'string',
                    'required',
                    'email',
                    'max:255', 
                    Rule::unique('users')->ignore($user)
                ],
                'password' => [
                    'string', 
                    'required', 
                    'min:8',
                    'max:255',
                    'confirmed'
                ],        
                
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

