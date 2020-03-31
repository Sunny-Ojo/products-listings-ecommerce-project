<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $_hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $_casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function _shop()
    {
        return $this->hasMany('App/Shop');
    }
    protected function _wishlist()
    {
        return $this->hasMany('App/Wishlist');
    }
    protected function _cart()
    {
        return $this->hasMany('App/Cart');
    }
}