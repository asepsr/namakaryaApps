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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('mitraPekerja');
            $table->string('kopkar');
            $table->string('noPks');
            $table->date('tglPks');
            $table->string('lamaPks');
            $table->string('namaPerusahaan');
            $table->string('metodeAngsuran');
            $table->string('namaPic');
            $table->string('jabatanPic');
            $table->string('contactPic');
            $table->foreignId('cabang_id')->constrained();
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
        Schema::dropIfExists('perusahaans');
    }
};
