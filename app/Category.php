<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    //

    protected $fillable = [
        'category_name', 'status'
    ];

    // public function product()
    // {
    //     return $this->belongsTo(product::class);
    // }
}
