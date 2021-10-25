<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->foreign(['id_pegawai'], 'pemesanan_ibfk_1')->references(['id_pegawai'])->on('pegawai');
            $table->foreign(['id_pemeriksaan'], 'pemesanan_ibfk_2')->references(['id_pemeriksaan'])->on('pemeriksaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropForeign('pemesanan_ibfk_1');
            $table->dropForeign('pemesanan_ibfk_2');
        });
    }
}
