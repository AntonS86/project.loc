<?php


namespace App\Models\Article;

use App\Models\Article;

class DeleteObserver
{
    /**
     * @param \App\Models\Article $article
     */
    public function deleting(Article $article): void
    {

        $article->images()->detach();

        $article->keywords()->detach();
    }
}
