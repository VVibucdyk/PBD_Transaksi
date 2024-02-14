<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
            $user = Socialite::driver('google')->stateless()->user();
         
            $finduser = User::where('google_id', $user->getId())->first();
         
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect('/');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'first_name' => $user->name,
                        // 'last_name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('12345678')
                    ]);
         
                Auth::login($newUser);
        
                return redirect('/');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
