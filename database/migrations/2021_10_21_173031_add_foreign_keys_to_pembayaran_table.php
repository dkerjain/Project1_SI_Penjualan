<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign(['id_pegawai'], 'pembayaran_ibfk_1')->references(['id_pegawai'])->on('pegawai');
            $table->foreign(['id_pemesanan'], 'pembayaran_ibfk_2')->references(['id_pemesanan'])->on('pemesanan');
            $table->foreign(['id_penjualan'], 'pembayaran_ibfk_3')->references(['id_penjualan'])->on('penjualan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign('pembayaran_ibfk_1');
            $table->dropForeign('pembayaran_ibfk_2');
            $table->dropForeign('pembayaran_ibfk_3');
        });
    }
}
