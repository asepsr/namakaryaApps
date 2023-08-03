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
        Schema::create('debiturs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->foreignId('cabang_id')->unsigned()->nullable();
            $table->foreignId('mitra_id')->unsigned()->nullable();
            $table->foreignId('accountOfficer_id')->unsigned()->nullable();
            $table->foreignId('perusahaan_id')->unsigned()->nullable();
            $table->string('name');
            $table->date('tglPengajuan');
            $table->string('noDebitur');
            $table->string('noKtp');
            $table->string('alamat');
            $table->string('tlp');
            $table->string('plafond');
            $table->integer('jwk');
            $table->string('ibuKandung');
            $table->string('tmptLahir');
            $table->date('tglLahir');
            $table->string('namaPasangan')->nullable();
            $table->date('tglLahirPasangan')->nullable();
            $table->string('pendidikan');
            $table->string('statusKawin');
            $table->string('npwp')->nullable();
            $table->string('domisili');
            $table->string('stsTinggal');
            $table->string('jenisPekerjaan');
            $table->string('lamaBekerja');
            $table->integer('gaji');
            $table->integer('status')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('debiturs');
    }
};
