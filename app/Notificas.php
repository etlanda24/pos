<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
	protected $fillable = [
	'pesan',
	'stok',
	'barang_id'
	];
     public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
