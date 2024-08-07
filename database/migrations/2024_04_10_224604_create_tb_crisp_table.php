<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_crisp', function (Blueprint $table) {
            $table->id('id_crisp');
            $table->string('kode_kriteria', 16)->nullable();
            $table->string('nama_crisp')->nullable();
            $table->double('nilai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_crisp');
    }
};
