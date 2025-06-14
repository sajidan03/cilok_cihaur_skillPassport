<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Models\Product;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    //
    public function index(){

        $data['product'] = Product::all();
        $data['member'] = Member::all();
        $data['category'] = Category::all();

        return view('admin.dasboard', $data);
    }

    public function product(){
        $data['product'] = Product::orderBy('created_at','desc')->get();
        return view('admin.product', $data);
    }

    public function category(String $id = null){
        if($id != null){
            try {
                $id = Crypt::decrypt($id);
            } catch (DecryptException $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
            $data['category'] = Category::find($id);
            $data['route'] = route('admin.category.update', Crypt::encrypt($id));
        }else{
            $data['route'] = route('admin.category.store');
        }

        $data['categories'] =  Category::orderBy('created_at','desc')->get();
        return view('admin.category', $data);
    }

    public function member(){
        $data['member'] = Member::all();
        return view('admin.member', $data);
    }
}
