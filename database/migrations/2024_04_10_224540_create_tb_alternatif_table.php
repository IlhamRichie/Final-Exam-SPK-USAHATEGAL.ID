<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_alternatif', function (Blueprint $table) {
            $table->string('kode_alternatif', 16)->primary();
            $table->string('nama_alternatif')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('harga', 25);
            $table->binary('foto');
            $table->string('link_pembelian');
            $table->double('total')->nullable();
            $table->integer('rank')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_alternatif');
    }
};
