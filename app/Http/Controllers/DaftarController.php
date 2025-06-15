<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function display(){
        return view('daftar');
    }
    public function register(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/login')->with('messages', 'Pendaftaran berhasil! Silakan login.');
    }
}
