<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Intervention\Image\Facades\Image;
use App\Post;
use App\Profile;

use Clarifai\API\ClarifaiClient;
use Clarifai\DTOs\Inputs\ClarifaiFileImage;
use Clarifai\DTOs\Outputs\ClarifaiOutput;
use Clarifai\DTOs\Predictions\Concept;

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
            'image' => [
                'required',
                'image',
                function ($attribute, $value, $fail) {
                    if ($this->detectHumanFace(request('image'))) {
                        $fail('Image contains a human. Please remove humans from the image');
                    }
                }
                ]
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        
        $post = new \App\Post;
        $post->caption = $data['caption'];
        $post->image = $imagePath;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function detectHumanFace($image)
    {
        $humanOnImage = false;

        $client = new ClarifaiClient('b952af584e1b41e2b6a7a498fe17a248');

        $model = $client->publicModels()->faceDetectionModel();

        $input = new ClarifaiFileImage(file_get_contents($image));

        $response = $model->predict($input)->executeSync();

        if ($response->isSuccessful()) {
            /** @var ClarifaiOutput $output */
            $output = $response->get();
            // dd($output->data());
            if(!empty($output->data())){
                $humanOnImage = true;
            }
        } else {
            echo "Response is not successful. Reason: \n";
            echo $response->status()->description() . "\n";
            echo $response->status()->errorDetails() . "\n";
            echo "Status code: " . $response->status()->statusCode();
        }

        return $humanOnImage;
    }
}
