<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->string('id_barang', 10);
            $table->string('id_pemesanan', 10)->index('id_pemesanan');
            $table->string('ukuran_lensa', 10)->nullable();
            $table->string('jenis_lensa', 10)->nullable();
            $table->string('merek_kacamata', 20)->nullable();
            $table->integer('harga_kacamata')->nullable();
            $table->integer('jumlah_pemesanan')->nullable();

            $table->primary(['id_barang', 'id_pemesanan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemesanan');
    }
}
