<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('street_village', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('street_id')->unsigned()->index();
            $table->integer('village_id')->unsigned()->index();
            $table->unique(['street_id', 'village_id']);
            $table->foreign('street_id')->references('id')->on('streets');
            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('street_village', function (Blueprint $table) {
            $table->dropForeign('street_village_street_id_foreign');
            $table->dropForeign('street_village_village_id_foreign');
        });
        Schema::dropIfExists('street_village');
    }
}
