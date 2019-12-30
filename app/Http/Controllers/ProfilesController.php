<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        
        Profile::where('user_id', auth()->user()->id)->update($data);

        return redirect('/profile/'.auth()->user()->id);
    }
}
