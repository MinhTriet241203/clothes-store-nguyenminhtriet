<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class socialAuthController extends Controller
{
    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->user();
        dd($user);
    }
    public function facebookCallback(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
