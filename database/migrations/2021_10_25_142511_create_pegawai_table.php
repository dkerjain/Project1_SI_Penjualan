<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('id_pegawai', 8)->primary();
            $table->string('id_jabatan', 12)->nullable()->index('id_jabatan');
            $table->string('nama_pegawai', 30)->nullable();
            $table->string('alamat_pegawai', 30)->nullable();
            $table->tinyInteger('jenis_kelamin')->nullable();
            $table->string('no_tlp', 13)->nullable();
            $table->string('username', 20)->nullable();
            $table->string('pasword', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
