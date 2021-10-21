<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->string('id_penjualan', 8);
            $table->string('id_barang', 10)->index('id_barang');
            $table->integer('jumlah_pembelian')->nullable();
            $table->integer('sub_total_harga')->nullable();

            $table->primary(['id_penjualan', 'id_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
}
