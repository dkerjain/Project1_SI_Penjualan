<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang', 10)->primary();
            $table->string('id_kategori', 10)->nullable()->index('id_kategori');
            $table->string('nama_barang', 20)->nullable();
            $table->integer('harga_barang')->nullable();
            $table->integer('stok_barang')->nullable();
            $table->string('foto_barang', 50)->nullable();
            $table->string('deskripsi_barang', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
