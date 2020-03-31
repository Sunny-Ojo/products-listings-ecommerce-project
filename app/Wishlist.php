<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    public function user()
    {
        # code...
        return $this->belongsTo('App\User');
    }
}