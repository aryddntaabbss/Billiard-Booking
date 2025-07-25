<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
            ]
        );

        Auth::login($user);
        Session::save();

        return redirect('/')->with('success', 'Login berhasil');
    }
}
