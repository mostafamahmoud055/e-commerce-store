<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $provider_user = Socialite::driver($provider)->stateless()->user();

        $user = User::where([
            'email' => $provider_user->email,
        ])->first();

        if ($user) {
            $user->update([
                'provider' => $provider,
                'provider_id' =>  $provider_user->id,
                'provider_token' => $provider_user->token,
            ]);
        } else {
            $user = User::create([
                'first_name' => explode(" ", $provider_user->name)[0],
                'last_name' => explode(" ", $provider_user->name)[1],
                'email' => $provider_user->email,
                'email_verified_at' => now(),
                'provider' => $provider,
                'provider_id' =>  $provider_user->id,
                'password' => Hash::make(Str::random(8)),
                'provider_token' => $provider_user->token,
            ]);
        }
        Auth::login($user);
        return redirect()->route('home');
    }
}
