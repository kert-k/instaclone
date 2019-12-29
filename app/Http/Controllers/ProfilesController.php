<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);
        return view('profiles.index', [
            'user' => $user
        ]);
    }
}
