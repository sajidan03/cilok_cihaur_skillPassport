<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartController extends Controller
{

    public function index()
    {
        $data['cart'] = Cart::where('members_id', Auth::user()->member->id)->get();
        return view('cart', $data);
    }
    //
    public function store(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $product = Product::find($id);

        $cart = Cart::where('products_id', $id)->first();

        Cart::updateOrCreate([
            'products_id' => $id,
            'members_id' => Auth::user()->member->id,
        ], [
            'price' => $product->price,
            'qty' => ($cart->qty ?? 0) + 1
        ]);

        return redirect('/cart');
    }

    public function checkout()
    {
        $cart = Cart::where('members_id', Auth::user()->member->id)->get();
        if ($cart->count() > 0) {
            $invoice  = Invoice::create([
                'no_invoice' => date('Ymdhis') . sprintf('%08d', Auth::user()->member->id),
                'expired_date' => Carbon::now()->addDays(2),
                'status' => '0',
                'proof' => '-',
                'members_id' => Auth::user()->member->id
            ]);

            foreach ($cart as $item) {
                # code...
                InvoiceDetail::create([
                    'products_id' => $item->products_id,
                    'price' => $item->price,
                    'qty' => $item->qty,
                    'invoices_id' => $invoice->id
                ]);

                Cart::find($item->id)->delete();
            }
            return redirect('payment/' . Crypt::encrypt($invoice->no_invoice));
        }
    }
}
