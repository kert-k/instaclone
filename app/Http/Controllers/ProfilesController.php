<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember('count.posts'.$user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });
        
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();
        
        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
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
            $imageArray = ['image' => $imagePath];
        }

        
        Profile::where('user_id', auth()->user()->id)->update(array_merge($data, $imageArray ?? []));

        return redirect('/profile/'.auth()->user()->id);
    }

    public function list()
    {
        $profiles = Profile::simplepaginate(10);

        return view('profiles.list', compact('profiles'));
    }
}
