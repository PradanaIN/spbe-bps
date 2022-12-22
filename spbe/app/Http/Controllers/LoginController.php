<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    // proses login
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' =>'required|email:dns',
            'password' =>'required'
        ]);

        // check
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('beranda');
        }

        return back()->with('error', 'Username or password is incorrect.');
    }

    // logout
    public function logout(Request $request) {
        Auth::logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
