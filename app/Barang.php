<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
    'kode_barang',
    'kategori_barang',
    'nama_barang',
    //'nama_supplier',
    'jumlah_barang',
    'harga_barang',
    'tanggal',
    'user_id',
    'supplier_id'
    ];

    public function notificas()
    {
        return $this->hasOne('App\Notificas');
    }
    
    public function transaksi(){
        return $this->hasMany('App\Transaksi');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function user(){
        return $this->belongsTo('App\User');
    } 
}
