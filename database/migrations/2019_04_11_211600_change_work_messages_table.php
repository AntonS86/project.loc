<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeWorkMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_messages', function (Blueprint $table) {
            $table->integer('phone_id')->unsigned();
            $table->foreign('phone_id')->references('id')->on('phones');

            $table->integer('work_id')->unsigned();
            $table->foreign('work_id')->references('id')->on('works');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_messages', function (Blueprint $table) {
            $table->dropForeign('work_messages_phone_id_foreign');
            $table->dropForeign('work_messages_work_id_foreign');
        });
    }
}
