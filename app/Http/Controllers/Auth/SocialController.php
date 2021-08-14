<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Validator, Redirect, Response, File;
use Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;


class SocialController extends Controller
{

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        try {
            $getInfo = Socialite::driver($provider)->user();

            session(['avatar' => $getInfo->avatar ?? null]);

            $user = $this->createUser($getInfo, $provider);
    
            auth()->login($user);
    
            return redirect()->to('/dashboard');
        } catch (Exception $e) {
            return redirect()->to('/login');
        }
       
    }

    function createUser($getInfo, $provider)
    {

        $user = User::where('provider_id', $getInfo->id)->first();

        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }
}
