<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityStreetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_street', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->index();
            $table->integer('street_id')->unsigned()->index();
            $table->unique(['city_id', 'street_id']);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('street_id')->references('id')->on('streets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('city_street', function (Blueprint $table) {
            $table->dropForeign('city_street_city_id_foreign');
            $table->dropForeign('city_street_street_id_foreign');
        });
        Schema::dropIfExists('city_street');
    }
}
