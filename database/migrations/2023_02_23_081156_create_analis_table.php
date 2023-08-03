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
        Schema::create('analis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debitur_id')->constrained();
            $table->foreignId('cabang_id')->constrained();
            $table->string('analis_number');
            $table->date('tglMpp');
            $table->string('jenisFasilitas');
            $table->string('noSurat');
            $table->string('tujuanFasilitas');
            $table->string('alamatPerusahaan');
            $table->string('area');
            $table->string('namaLo');
            $table->string('namaCollection');
            $table->string('namaTl');
            $table->float('rate', 8, 2);
            $table->string('tenor');
            $table->string('noKontrak');
            $table->string('dataJaminan');
            $table->string('noBpjs');
            $table->float('saldoBpjs', 19, 2);
            $table->float('hasilLain', 19, 2);
            $table->string('jenisPengajuan');
            $table->string('deskripsi');
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
        Schema::dropIfExists('analis');
    }
};
