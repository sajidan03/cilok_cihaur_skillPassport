<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    //
    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
