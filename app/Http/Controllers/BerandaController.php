<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BerandaController extends Controller
{
    //
    public function index(){
        // $produk = [
        //     ['nama' => 'Monitor','harga'=>1000000,'gambar'=>'monitor.jpg'],
        //     ['nama' => 'Keyboard','harga'=>500000, 'gambar'=>'keyboard.jpg'],
        //     ['nama' => 'Mouse','harga'=>200000, 'gambar'=>'mouse.jpg'],
        // ];
        $produk = Product::orderBy('created_at','desc')->limit(3)->get();
        return view('beranda', compact('produk'));
    }
}
