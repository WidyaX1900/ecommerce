<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email|email:rfc,dns',
            'password' => 'required|same:confirm',
            'confirm' => 'required|same:password'
        ]);

        $insert = User::create([
            'uuid' => rand(),
            'email' => $request->email,
            'role_id' => 1,
            'password' => Hash::make($request->password)
        ]);

        if ($insert) {
            $request->session()->flash('message', 'Account created successfully. Now log in to your account to use the app');
            return redirect('/login');
        } else {
            echo "Data save failed";
        }
    }

    public function authenthicate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required'
        ]);

        $attempt = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($attempt)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'password' => 'Wrong password!'
            ])->onlyInput('password');
        }
    }
}
