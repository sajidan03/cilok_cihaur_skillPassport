<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\Cast\String_;

class MemberController extends Controller
{
    //
    public function create(){
        return view('admin.member-create');
    }
    public function displayedit(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
             return redirect()->back()->with('danger', $e->getMessage());
        }

        $data['member'] = Member::find($id);

        return view('admin.member-edit', $data);
    }


public function edit(Request $request, $id)
{
    try {
        $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
        return redirect()->back()->with('danger', 'Invalid ID.');
    }

    // Validasi input
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'nohp' => 'required|max:13',
        'address' => 'required|string',
        'password' => 'nullable|min:6',
        // 'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:5096',
    ]);

    $member = Member::findOrFail($id);
    $user = User::findOrFail($member->users_id);

    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
        $user->password = bcrypt($request->password);
    }
    $user->save();

    // if ($request->hasFile('foto')) {
    //     $image = $request->file('foto');
    //     $fileName = time() . "-" . $user->id . "." . $image->getClientOriginalExtension();
    //     $image->storeAs('member', $fileName);
    // } else {
    //     $fileName = $member->foto;
    // }

    $member->update([
        'name' => $request->name,
        'nohp' => $request->nohp,
        'address' => $request->address,
        // 'foto' => $fileName,
    ]);

    return redirect()->route('admin.member')->with('success', 'Member berhasil diupdate.');
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

        // if($request->hasFile('foto')){
        //     $image = $request->file('foto');
        //     $fileName = time()."-".$user->id.".".$image->getClientOriginalExtension();
        //     $image->storeAs('member',$fileName);
        // }else{
        //     $fileName = "-";
        // }

        Member::create([
            'name' => $request->name,
            'nohp' => $request->nohp,
            'address' => $request->address,
            // 'foto' => $fileName,
            'users_id' => $user->id
        ]);

        return redirect()->route('admin.member')->with('success','saved member successfull');
    }

}
