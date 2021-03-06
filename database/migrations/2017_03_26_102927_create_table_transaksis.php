<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang',30);
            $table->string('kategori_barang',30);
            $table->integer('harga_barang');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->timestamps();

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
      
        $table->integer('barang_id')->unsigned();
        $table->foreign('barang_id')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
