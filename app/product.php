<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'id_category', 'product_name','photo','stock','description','price','weight','long','heigt','wide','status'
    ];
    //
    // public function category()
    // {
    //     return $this->hasMany(Category::class);
    //     // note: we can also include comment model like: 'App\Models\Comment'
    // }

    // public function transaction_detail()
    // {
    //     return $this->belongsTo(TransactionDetail::class);
    // }
}
