<?php

namespace App\Http\Controllers\Auth\SocialiteProviders;

use App\Http\Controllers\Controller;
use App\Models\SocialiteProvider;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $googleStoredSocialiteUser =SocialiteProvider::where('provider_name', 'google')
                ->where('provider_id', $googleUser->id)
                ->first();

            if($googleStoredSocialiteUser) {
                Auth::login($googleStoredSocialiteUser->user);

                return redirect()->intended(RouteServiceProvider::HOME);
            }

            $user = User::firstOrcreate(['email' => $googleUser->email], [
                'name' => $googleUser->name,
                'password' => Str::random(),
            ]);

            $user->socialiteProviders()->create([
                'provider_name' => 'google',
                'provider_id' => $googleUser->id,
            ]);

            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (Exception $e) {
            \Log::debug($e->getMessage());

            return redirect()->route('register')
                ->with('status', 'unknown error happened');
        }
    }
}
