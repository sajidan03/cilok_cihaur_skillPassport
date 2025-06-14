<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        //
        if (Auth::user()->level == 'member') {
            $data['invoices'] = Invoice::where('members_id', Auth::user()->member->id)->get();
            return view('invoices', $data);
        } else {
            $data['invoices'] = Invoice::get();
            return view('admin.invoices', $data);
        }
    }

    public function update(Request $request, String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        Invoice::where('no_invoice', $id)->update([
            'status' => $request->status
        ]);
        return redirect()->back();
    }

    public function store()
    {
        // $cart = Cart::where('members_id', Auth::user()->member->id)->get();
        // if ($cart->count() > 0) {
        //     $invoice  = Invoice::create([
        //         'no_invoice' => date('Ymdhis') . sprintf('%08d', Auth::user()->member->id),
        //         'expired_date' => Carbon::now()->addDays(2),
        //         'status' => '0',
        //         'proof' => '-',
        //         'members_id' => Auth::user()->member->id
        //     ]);

        //     foreach ($cart as $item) {
        //         # code...
        //         InvoiceDetail::create([
        //             'products_id' => $item->products_id,
        //             'price' => $item->price,
        //             'qty' => $item->qty
        //         ]);
        //     }
        // }
    }


    public function payment(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect('/');
        }

        $data['invoice'] = Invoice::where('no_invoice', $id)->first();

        return view('payment', $data);
    }

    public function confirm(Request $request, String $id)
    {

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $validation = $request->validate([
            'proof' => 'image|mimes:png,jpg,jpeg|max:5096',
        ]);

        $invoice = Invoice::where('no_invoice', $id)->first();

        if ($request->hasFile('proof')) {
            if (Storage::exists('invoice/' . $invoice->proof)) {
                Storage::delete('invoice/' . $invoice->prood);
            }

            $image = $request->file('proof');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $image->storeAs('invoice', $filename);

            $validation['proof'] = $filename;

            $invoice->update($validation);
        }

        return redirect('/home');
    }
}
