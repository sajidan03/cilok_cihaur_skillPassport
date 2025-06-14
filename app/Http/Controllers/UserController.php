<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.login');
    }

    public function member()
    {
        return view('login');
    }
   public function login(Request $request)
{
    $validasi = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($validasi)) {
        $request->session()->regenerate();

        if (Auth::user()->level == 'member') {
            return redirect()->intended('/');
        } elseif (Auth::user()->level == 'admin') {
            return redirect()->intended('/administrator');
        } else {
            Auth::logout(); // Logout jika level tidak dikenali
            return redirect()->back()->with('messages', 'Role tidak dikenali.');
        }
    }

    return redirect()->back()->with('messages', 'Login unsuccessful');
}
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
