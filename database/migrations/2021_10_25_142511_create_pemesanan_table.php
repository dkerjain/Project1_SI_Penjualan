<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->string('id_pemesanan', 13)->primary();
            $table->string('id_pegawai', 8)->nullable()->index('id_pegawai');
            $table->string('id_pemeriksaan', 10)->nullable()->index('id_pemeriksaan');
            $table->dateTime('tanggal_pemesanan')->nullable();
            $table->dateTime('tanggal_selesai_pemesanan')->nullable();
            $table->integer('total_biaya')->nullable();
            $table->string('status_pemesanan', 10)->nullable();
            $table->string('status_pembayaran', 10)->nullable();
            $table->string('nama_pelanggan', 30)->nullable();
            $table->string('alamat_pelanggan', 100)->nullable();
            $table->string('no_pelanggan', 13)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
