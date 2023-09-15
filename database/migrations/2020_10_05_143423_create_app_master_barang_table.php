<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppMasterBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_master_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('master_barang_kategori_id'); 
            $table->string('nama'); 
            $table->string('satuan'); 
            $table->integer('harga_beli'); 
            $table->integer('harga_jual'); 
            $table->integer('harga_jual_grosir'); 
            $table->integer('min_stok'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_master_barang');
    }
}
