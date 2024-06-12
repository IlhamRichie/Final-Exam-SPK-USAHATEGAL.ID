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
        Schema::create('tb_rel_alternatif', function (Blueprint $table) {
            $table->id('ID');
            $table->string('kode_alternatif', 16)->nullable();
            $table->string('kode_kriteria', 16)->nullable();
            $table->bigInteger('id_crisp')->nullable();
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
        Schema::dropIfExists('tb_rel_alternatif');
    }
};
