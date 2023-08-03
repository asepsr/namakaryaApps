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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('debitur_id')->constrained();
            $table->foreignId('mitra_id')->constrained();
            $table->foreignId('cabang_id')->constrained();
            $table->integer('noFasilitas');
            $table->integer('fasilitas')->nullable();
            $table->integer('plafondRekomendasi')->nullable();
            $table->string('note')->nullable();
            $table->string('statusKolek')->nullable();
            $table->string('slik')->nullable();
            $table->string('alasanTolak')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('fasilitas');
    }
};
