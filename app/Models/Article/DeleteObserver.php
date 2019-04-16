<?php


namespace App\Models\Article;

use App\Article;

class DeleteObserver
{
    /**
     * @param Article $article
     */
    public function deleting(Article $article): void
    {

        $article->images()->detach();

        $article->keywords()->detach();
    }
}
