<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        
        if(request('image')){
            $imagePath = request('image')->store('profileImages', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

        }

        \App\Profile::where('user_id', auth()->user()->id)->update(array_merge($data, ['image' => $imagePath]));

        return redirect('/profile/'.auth()->user()->id);
    }
}
