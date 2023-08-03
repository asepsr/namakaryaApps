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
        Schema::create('sliks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debitur_id');
            $table->foreignId('mitra_id');
            $table->date('tglSlik');
            $table->string('statusKolek');
            $table->string('keterangan');
            $table->string('note');
            $table->string('status');
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
        Schema::dropIfExists('sliks');
    }
};
