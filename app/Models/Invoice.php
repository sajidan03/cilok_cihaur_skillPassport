<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $guarded = [];

    public function invoicedetail()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoices_id');
    }
}
