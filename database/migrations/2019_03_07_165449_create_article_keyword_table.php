<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_keyword', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
        });

        Schema::table('article_keyword', function (Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_keyword', function (Blueprint $table) {
            $table->dropForeign('article_keyword_article_id_foreign');
            $table->dropForeign('article_keyword_keyword_id_foreign');
        });
        Schema::dropIfExists('article_keyword');
    }
}
