<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();

        $user = User::where('email', $userSocial->getEmail())->first();

        if($user) {
            Auth::login($user);
            return redirect('/profile/'.$user->id);
        }else{

            $newUser = User::create([
                'name'          => $userSocial->getName(),
                'username'      => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'avatar'        => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
                ]);
            
            return redirect('/profile/'.$newUser->id);
        }

    }
}
