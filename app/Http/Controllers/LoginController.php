<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();
            // dd($finduser);
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
               $id = Auth::user()->id;
                $member =  User::find($id);
                // dd($id);
                return redirect()->route('profile.index');
            }else{
                //user is not yet created, so create first
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;
                $newUser->google_id = $user->id;
                $newUser->role = 'Member';
                $newUser->password =encrypt('');
                $newUser->save();


                //every user needs a team for dashboard/jetstream to work.
                //create a personal team for the user
             
                //every user needs a team for dashboard/jetstream to work.
                //create a personal team for the user
             
                Auth::login($newUser);
        // dd($id);
         return redirect()->route('profile.index');
                // go to the dashboard
                // return redirect('dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

