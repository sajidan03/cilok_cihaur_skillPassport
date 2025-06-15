<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function create(){
        return view('admin.member-create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'nohp' => 'required|max:13',
            'address' => 'required|string',
            'password' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5096',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $fileName = time()."-".$user->id.".".$image->getClientOriginalExtension();
            $image->storeAs('member',$fileName);
        }else{
            $fileName = "-";
        }

        Member::create([
            'name' => $request->name,
            'nohp' => $request->nohp,
            'address' => $request->address,
            'foto' => $fileName,
            'users_id' => $user->id
        ]);

        return redirect()->route('admin.member')->with('success','saved member successfull');
    }
}
