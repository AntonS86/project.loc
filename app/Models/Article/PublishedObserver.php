<?php


namespace App\Models\Article;


use App\Models\Article;

class PublishedObserver
{

    /**
     * @param Article $article
     */
   public function saving(Article $article): void
   {
       if ($article->status == 'published' && ! $article->published_at) {
           $article->published_at = now();
       }
   }

}
