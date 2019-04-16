<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeImageWorkMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_work_message', function (Blueprint $table) {

            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('work_message_id')->references('id')->on('work_messages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_work_message', function (Blueprint $table) {

            $table->dropForeign('image_work_message_image_id_foreign');
            $table->dropForeign('image_work_message_work_message_id_foreign');
        });
    }
}
