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
        Schema::create('biayas', function (Blueprint $table) {
            $table->id();
            $table->string('namaBiaya');
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
        Schema::dropIfExists('biayas');
    }
};
