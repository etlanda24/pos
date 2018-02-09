<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function barang(){
        return $this->hasMany('App\Barang');
    }
    public function supplier(){
        return $this->hasMany('App\Supplier');
    }
    public function transaksi(){
        return $this->hasMany('App\Transaksi');
    }
}
