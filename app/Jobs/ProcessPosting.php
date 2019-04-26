<?php

namespace App\Jobs;

use App\Models\Article;
use App\Services\Crosspostings\PostingInterface;
use App\Services\Crosspostings\VkArticle;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ProcessPosting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Попытки отправить
     * @var int
     */
    public $tries = 3;
    /**
     * @var Article
     */
    private $article;

    /**
     * Create a new job instance.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @param PostingInterface $vkPosting
     *
     * @return void
     */
    public function handle(PostingInterface $vkPosting)
    {
        Log::info('|posting VK - start|');
        $query = (new VkArticle($this->article))->postLink()->toArray();
        do {
            $marker   = false;
            $response = $vkPosting->send($query);
            Log::info($response);
            $response = json_decode($response, true);
            if (Arr::has($response, 'error.error_code') && Arr::get($response, 'error.error_code') === 6) {
                $marker = true;
                sleep(1);
            }
        } while ($marker);
    }
}
