<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        //have the auth'd follow the given user
      
        auth()
            ->user()
            ->toggleFollow($user);

        return back();    
    }
}
