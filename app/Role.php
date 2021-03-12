<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name', 'status'
    ];
    //

    // public function admin()
    // {
    //     return $this->belongsTo(Admin::class);
    // }
}
