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
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tglDisburs');
            $table->foreignId('debitur_id');
            $table->string('NoSpk');
            $table->integer('angsuran');
            $table->integer('biayaLainya');
            $table->double('bunga');
            $table->integer('provisi');
            $table->integer('admin');
            $table->integer('asuransi')->nullable();
            $table->integer('notaris')->nullable();
            $table->integer('simpPokok')->nullable();
            $table->integer('simpWajib')->nullable();
            $table->double('tabungan');
            $table->double('hold');
            $table->integer('materai');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disbursements');
    }
};
