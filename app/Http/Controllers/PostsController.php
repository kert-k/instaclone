<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Intervention\Image\Facades\Image;
use App\Post;
use App\Profile;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following->pluck('user_id');
        $profiles = Profile::all();

        // alternative orderBy('created_at', 'DESC') === latest()
        $posts = Post::whereIn('user_id', $users)->with('user')->orderBy('created_at', 'DESC')->simplePaginate(5);

        return view('posts.index', compact('posts', 'profiles'));
    }

    public function create()
    {
        $this->authorize('update', auth()->user()->profile);

        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        
        $post = new \App\Post;
        $post->caption = $data['caption'];
        $post->image = $imagePath;
        $post->user_id = auth()->user()->id;
        $post->save();

        //NOT WORKING
        // auth()->user()->posts()->create([
        //     'caption' => $data['caption'],
        //     'image' => '/storage/' . $imagePath,
        // ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
