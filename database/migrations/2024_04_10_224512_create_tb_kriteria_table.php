<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_kriteria', function (Blueprint $table) {
            $table->string('kode_kriteria', 16)->primary();
            $table->string('nama_kriteria')->nullable();
            $table->string('atribut', 16)->nullable();
            $table->double('bobot')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_kriteria');
    }
};
