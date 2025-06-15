<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        return view('produk', compact('category'));
    }

    public function detail(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $data['product']  = Product::find($id);
        // Product::where('id', $id)->first();
        return view('detail', $data);
    }

    public function create(){
        $data['category'] = Category::all();
        return view('admin.product-create', $data);
    }

    public function store(Request $request){

        $validation = $request->validate([
            'name' => 'required|max:50|string',
            'price' => 'required|numeric|min:0',
            'descriptions' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5096',
            'categories_id' => 'required'
        ]);

        // $image = $request->file('image')->store('product');
        // $validation['image'] = $image;


        $image = $request->file('image');
        $filename = time() .".". $image->getClientOriginalExtension();
        $image->storeAs('product', $filename);

        $validation['image'] = $filename;

        Product::create($validation);

        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'descriptions' => $request->descriptions,
        //     'image' => '-',
        //     'categories_id' => $request->categories_id
        // ]);

        return redirect('/administrator/product')->with('success','Data Product Berhasil Disimpan!');
    }


    public function delete(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $product = Product::find($id);

        if(Storage::exists('product/'.$product->image)){
            Storage::delete('product/'.$product->image);
        }

       $product->delete();

        return redirect()->back()->with('success', 'Data product berhasil dihapus');
    }

    public function edit(String $id){

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
             return redirect()->back()->with('danger', $e->getMessage());
        }

        $data['product'] = Product::find($id);
        $data['category'] = Category::all();

        return view('admin.product-edit', $data);
    }

    public function update(Request $request, String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $validation = $request->validate([
            'name' => 'required|max:50|string',
            'price' => 'required|numeric|min:0',
            'descriptions' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg|max:5096',
            'categories_id' => 'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('image')){
            if(Storage::exists('product/'.$product->image)){
                Storage::delete('product/'.$product->image);
            }

            $image = $request->file('image');
            $filename = time() .".". $image->getClientOriginalExtension();
            $image->storeAs('product', $filename);

            $validation['image'] = $filename;
        }

        $product->update($validation);

        // Product::find($id)->update($validation);
        return redirect('/administrator/product')->with('success','Data Product Berhasil Diubah!');

    }

}
