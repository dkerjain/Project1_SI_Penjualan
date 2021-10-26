<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            $table->foreign(['id_penjualan'], 'detail_penjualan_ibfk_1')->references(['id_penjualan'])->on('penjualan');
            $table->foreign(['id_barang'], 'detail_penjualan_ibfk_2')->references(['id_barang'])->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            $table->dropForeign('detail_penjualan_ibfk_1');
            $table->dropForeign('detail_penjualan_ibfk_2');
        });
    }
}
