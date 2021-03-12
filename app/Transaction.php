<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id_customer', 'status', 'transaction_date'
    ];
    //
    // public function customer()
    // {
    //     return $this->hasMany(Customer::class);
    //     // note: we can also include comment model like: 'App\Models\Comment'
    // }

    // public function transaction_detail()
    // {
    //     return $this->belongsTo(TransactionDetail::class);
    // }
}
