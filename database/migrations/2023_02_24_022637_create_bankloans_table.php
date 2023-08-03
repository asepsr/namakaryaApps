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
        Schema::create('bankloans', function (Blueprint $table) {
            $table->id();
            $table->string('analis_number')->nullable();
            $table->date('tglMpp')->nullable();
            $table->string('bankName')->nullable();
            $table->float('loan',19,2)->nullable();
            $table->float('outstanding',19,2)->nullable();
            $table->float('angsuran',19,2)->nullable();
            $table->string('tujuanPinjaman')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('statusPinjaman')->nullable();
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
        Schema::dropIfExists('bankloans');
    }
};
