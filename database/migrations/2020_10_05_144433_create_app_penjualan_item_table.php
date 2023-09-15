<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPenjualanItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_penjualan_item', function (Blueprint $table) {
            $table->id();
            $table->integer('penjualan_id'); 
            $table->integer('pembelian_id'); 
            $table->integer('qty'); 
            $table->integer('harga_jual'); 
            $table->integer('diskon'); 
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
        Schema::dropIfExists('app_penjualan_item');
    }
}
