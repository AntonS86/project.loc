<?php


namespace App\Models\Article;


use App\Jobs\ProcessPosting;
use App\Models\Article;

class PostingObserver
{


    /**
     * @var ProcessPosting
     */
    private $processPosting;

    /**
     * PostingObserver constructor.
     *
     * @param ProcessPosting $processPosting
     */
    public function __construct(ProcessPosting $processPosting)
    {

        $this->processPosting = $processPosting;
    }

    /**
     * @param Article $article
     */
    public function saved(Article $article): void
    {
        if ($article->status === 'published') {
            $this->processPosting->dispatch($article);
        }
    }
}
