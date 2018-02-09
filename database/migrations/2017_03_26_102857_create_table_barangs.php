<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_barang',15);
            $table->string('kategori_barang',30);
            //$table->string('nama_supplier',30);
            $table->string('nama_barang',90);            
            $table->integer('jumlah_barang');
            $table->integer('harga_barang');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('supplier2s')->onUpdate('cascade')->onDelete('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
