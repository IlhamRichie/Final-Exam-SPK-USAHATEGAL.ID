<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_alternatif', function (Blueprint $table) {
            $table->string('kode_alternatif', 16)->primary();
            $table->string('nama_alternatif')->nullable();
            $table->string('keterangan')->nullable();
            $table->double('total')->nullable();
            $table->integer('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_alternatif');
    }
};
