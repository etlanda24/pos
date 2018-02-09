<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable =[
    'nama_barang',
    'kategori_barang',
    'harga_barang',
    'jumlah_barang',
    'total_harga',
    'user_id',
    'barang_id'
    ];
    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
