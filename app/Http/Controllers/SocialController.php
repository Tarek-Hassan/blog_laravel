<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;

class SocialController extends Controller
{
// GITHUB
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider( $provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request,$provider)
    {
        $userInfo=Socialite::driver($provider)->user();
        $authUser=$this->findOrCreateUser($userInfo,$provider);
        // return redirect()->back()->withErrors(['THIS User IS HAVE AN ACCOUNT']);
        auth()->login($authUser);
        return redirect()->route("Posts.index");

    }
    public function findOrCreateUser($userInfo,$provider){
        // (check for the mail)SameEmail=>Maybe_UsedInDiffrent_SocialMedia 
        // $userEmail= User::where('email',$userInfo->email)->first();
        $user = User::where('provider_id',$userInfo->id)->first();
        // if(!$userEmail && !$user){
        if(!$user){
           
            $user = User::create([
                'name'   => $userInfo->name,
                'email'    => $userInfo->email,
                'provider' => $provider,
                'provider_id' => $userInfo->id,
                'token' => $userInfo->token,
            ]);
            // return $user;
        
        }
        return $user;


    }
}
