<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    //

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|string'
        ]);
        Category::create($validate);
        return redirect()->back()->with('success', "Data berhasil disimpan");
    }

    public function delete(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        Category::find($id)->delete();
        return redirect()->back()->with('success', "Data berhasil dihapus");
    }

    public function update(Request $request, String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $validate = $request->validate([
            'name' => 'required|string'
        ]);
        Category::find($id)->update($validate);
        return redirect()->back()->with('success', "Data berhasil diubah");
    }
}
