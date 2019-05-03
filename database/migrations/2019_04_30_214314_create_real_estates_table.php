<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rubric_id')->unsigned()->index();
            $table->integer('type_id')->unsigned()->index();
            $table->integer('region_id')->unsigned()->index();
            $table->integer('area_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('district_id')->unsigned()->nullable();
            $table->integer('village_id')->unsigned()->nullable();
            $table->integer('street_id')->unsigned();
            $table->integer('floors')->unsigned()->nullable(); //этажей
            $table->integer('floor')->unsigned()->nullable(); //этаж
            $table->integer('balcony')->unsigned()->nullable(); //балкон
            $table->integer('loggia')->unsigned()->nullable(); //лоджия
            $table->integer('room')->unsigned()->nullable(); //количество комнат
            $table->decimal('land_square', 8, 1)->unsigned()->nullable();
            $table->decimal('total_square', 8, 1)->unsigned()->nullable();
            $table->text('description');
            $table->enum('status', ['published', 'archived']);
            $table->string('cadastral_number')->nullable();
            $table->integer('price')->unsigned()->index();
            $table->year('year')->nullable();

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
        Schema::dropIfExists('real_estates');
    }
}
