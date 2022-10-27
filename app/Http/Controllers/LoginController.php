<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'LOGIN | LAZUARDICODE',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->is_admin == 1) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->route('/');
            }
        }

        return back()->with('loginError', 'login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
