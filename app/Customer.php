<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name', 'gender','phone_number','address','email','password','status'
    ];
    //
    // public function transaction()
    // {
    //     return $this->belongsTo(Transaction::class);
    // }
}
