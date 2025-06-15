<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function display(){
        return view('daftar');
    }
    public function daftar(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'member'
        ]);
        Member::create([
            'name' => $request->name,
            'nohp' => $request->nohp,
            'address' => $request->address,
            'users_id' => $user->id
        ]);
     
        return redirect('/login')->with('messages-success', 'Pendaftaran berhasil! Silakan login.');
    }
}
