<?php

namespace App\Http\Controllers\Auth;

  use App\Http\Controllers\Controller;
  use App\Models\User;
  use Auth;
  use Exception;
  use Laravel\Socialite\Facades\Socialite;

  class GithubController extends Controller
  {
      /**
      * Create a new controller instance.
      *
      * @return void
      */
      public function redirectToGithub()
      {
          return Socialite::driver('github')->redirect();
      }

      /**
      * Create a new controller instance.
      *
      * @return void
      */
      public function handleGithubCallback()
      {
          try {
              $user = Socialite::driver('github')->user();
              dd($user);
              $finduser = User::where('github_id', $user->id)->first();

              if ($finduser) {
                  Auth::login($finduser);

                  return redirect()->route('posts.index');
              } else {
                  $newUser = User::where('email', $user->email)->first();
                  if ($newUser) {
                      $newUser->github_id = $user->id;
                      $newUser->github_token = $user->token;
                      $newUser->save();
                  } else {
                      $newUser = User::create([
                          'name' => $user->name ? $user->name : $user->nickname,
                          'email' => $user->email,
                          'github_id'=> $user->id,
                          'github_token' => $user->token,
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
