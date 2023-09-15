<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_pembelian', function (Blueprint $table) {
            $table->id();
            $table->integer('master_barang_id'); 
            $table->integer('supplier_id'); 
            $table->integer('qty'); 
            $table->integer('harga_beli'); 
            $table->date('tanggal_pembelian'); 
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
        Schema::dropIfExists('app_pembelian');
    }
}
