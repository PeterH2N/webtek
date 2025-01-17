<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public static function authenticate(Request $request) :RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            request()->session()->regenerate();

            $user = User::find(Auth::id());

            return redirect()->intended(route('profile.show', ['username'=>$user->username]));
        }

        return back()->with('error', 'Wrong email or password');
    }

    public static function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
