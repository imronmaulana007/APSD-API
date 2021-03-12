<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'id_transaction', 'id_product', 'qty', 'price_total'
    ];
    //
    // public function transaction()
    // {
    //     return $this->hasMany(Transaction::class);
    //     // note: we can also include comment model like: 'App\Models\Comment'
    // }

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    //     // note: we can also include comment model like: 'App\Models\Comment'
    // }
}
