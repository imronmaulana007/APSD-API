<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = [
        'id_role', 'admin_name', 'gender','phone_number','address','email','password','status'
    ];

    // BACA INI
    // https://shouts.dev/laravel-eloquent-one-to-many-relationship
    //We have set post_id as a foreign key. So the comment/s will be deleted if we delete the post.
    
    // public function role()
    // {
    //     return $this->hasMany(Role::class);
    //     // note: we can also include comment model like: 'App\Models\Comment'
    // }
}
