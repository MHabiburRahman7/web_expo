<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBerkasTypeKompetisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kompetisi_berkasType', function (Blueprint $table) {
            //
            $table->foreign('kompetisi_id')->references('id')->on('kompetisi');
            $table->foreign('berkasType_id')->references('id')->on('berkasType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kompetisi_berkasType', function (Blueprint $table) {
            //
            $table->dropForeign('kompetisi_id');
            $table->dropForeign('berkasType_id');
        });
    }
}
