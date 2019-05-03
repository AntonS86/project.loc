<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_real_estate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->unsigned()->index();
            $table->integer('real_estate_id')->unsigned()->index();
            $table->enum('title', ['Y', 'N'])->default('N');
            $table->unique(['image_id', 'real_estate_id']);
        });

        Schema::table('image_real_estate', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('real_estate_id')->references('id')->on('real_estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_real_estate', function (Blueprint $table) {
            $table->dropForeign('image_real_estate_image_id_foreign');
            $table->dropForeign('image_real_estate_real_estate_id_foreign');
        });
        Schema::dropIfExists('image_real_estate');
    }
}
