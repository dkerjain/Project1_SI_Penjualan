<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pemesanan', function (Blueprint $table) {
            $table->foreign(['id_barang'], 'detail_pemesanan_ibfk_1')->references(['id_barang'])->on('barang');
            $table->foreign(['id_pemesanan'], 'detail_pemesanan_ibfk_2')->references(['id_pemesanan'])->on('pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pemesanan', function (Blueprint $table) {
            $table->dropForeign('detail_pemesanan_ibfk_1');
            $table->dropForeign('detail_pemesanan_ibfk_2');
        });
    }
}
