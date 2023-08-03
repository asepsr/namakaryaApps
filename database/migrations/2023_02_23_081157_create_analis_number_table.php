<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('
            CREATE TRIGGER id_analis BEFORE INSERT ON analis FOR EACH ROW
            BEGIN
                INSERT INTO sequence_analis VALUES (NULL);
                SET NEW.analis_number = CONCAT("ANA_", LPAD(LAST_INSERT_ID(), 6, "0"));
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
