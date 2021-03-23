<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
  use Exception;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            dd($user);
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);

                return redirect()->route('posts.index');
            } else {
                $newUser = User::where('email', $user->email)->first();
                if ($newUser) {
                    $newUser->google_id = $user->id;
                    $newUser->google_token = $user->token;
                    $newUser->save();
                } else {
                    $newUser = User::create([
                        'name' => $user->name ? $user->name : $user->nickname,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'google_token' => $user->token,
                        'password' => encrypt('123456dummy'),
                    ]);
                }
               

                Auth::login($newUser);

                return redirect()->route('posts.index');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
