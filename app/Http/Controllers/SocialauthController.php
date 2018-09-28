<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socialauth;
use App\User;

class SocialauthController extends Controller
{
    //
    public function redirect($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = \Socialite::driver($provider)->user();
        $account = Socialauth::where([
            'provider' => $provider,
            'social_id' => $user->id,
        ])->first();

        if($account){
            auth()->login($account->user);
            return redirect()->to('/');
        }

        $localUser = User::where('email',$user->email)->first();

        if($localUser){
            return redirect()->to('/');
        }

        $newUser = new User;
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = md5(rand(1,1000));
        $newUser->save();

        $newAccount = new Socialauth();
        $newAccount->provider = $provider;
        $newAccount->social_id = $user->id;
        $newAccount->user_id = $newUser->id;
        $newAccount->save();

        auth()->login($newUser);

        return redirect()->to('/');
    }
}
