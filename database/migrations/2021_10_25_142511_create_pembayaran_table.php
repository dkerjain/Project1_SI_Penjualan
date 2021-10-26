<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('id_pembayaran', 13)->primary();
            $table->string('id_pegawai', 8)->nullable()->index('id_pegawai');
            $table->string('id_pemesanan', 13)->nullable()->index('id_pemesanan');
            $table->string('id_penjualan', 8)->nullable()->index('id_penjualan');
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->integer('total_bayar')->nullable();
            $table->integer('jumlah_bayar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
