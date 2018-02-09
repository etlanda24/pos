<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{   
    protected $table = "supplier2s";
    protected $fillable = [
    'nama_supplier',
    'alamat',
    'no_hp',
    'user_id'
    ];

    public function barang(){
    	return $this->hasMany('App\Barang');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
