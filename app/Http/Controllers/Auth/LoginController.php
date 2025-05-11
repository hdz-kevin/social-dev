<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->attempt($credentials, (bool) $request->remember)) {
            return back()->with('message', 'Invalid Creadentials');
        }

        $request->session()->regenerate();

        return redirect()->route('profile.show');
    }
}
