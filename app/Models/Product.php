<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'products_id');
    }

    public function invoicedetail()
    {
        return $this->hasMany(InvoiceDetail::class, 'products_id');
    }
}
