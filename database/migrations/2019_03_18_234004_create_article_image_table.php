<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->enum('title', ['Y', 'N'])->default('N');
        });

        Schema::table('article_image', function (Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_image', function (Blueprint $table) {
            $table->dropForeign('article_image_article_id_foreign');
            $table->dropForeign('article_image_image_id_foreign');
        });
        Schema::dropIfExists('article_image');
    }
}
