<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('real_estates', function (Blueprint $table) {
            $table->foreign('rubric_id')->references('id')->on('rubrics');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('village_id')->references('id')->on('villages');
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
        Schema::table('real_estates', function (Blueprint $table) {
            $table->dropForeign('real_estates_rubric_id_foreign');
            $table->dropForeign('real_estates_type_id_foreign');
            $table->dropForeign('real_estates_region_id_foreign');
            $table->dropForeign('real_estates_area_id_foreign');
            $table->dropForeign('real_estates_city_id_foreign');
            $table->dropForeign('real_estates_district_id_foreign');
            $table->dropForeign('real_estates_village_id_foreign');
            $table->dropForeign('real_estates_street_id_foreign');
        });
    }
}
