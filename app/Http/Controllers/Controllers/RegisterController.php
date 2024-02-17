<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    function registerProcess(Request $request)
    {
        // Cek apakah email sudah terdaftar
        $get_user = User::where('email', $request->email)->first();
        if ($get_user == null) {
            if ($request->password == $request->re_password) {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    return redirect('/');
                }
            } else {
                return redirect()->back()->with('success', 'Password tidak match!');
            }
        } else {
            return redirect()->back()->with('success', 'Email Sudah Terdaftar!');
        }
    }
}
