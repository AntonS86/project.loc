<?php


namespace App\Providers;


use App\Services\Crosspostings\PostingInterface;
use App\Services\Crosspostings\VkPosting;
use Illuminate\Support\ServiceProvider;

class PostingServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function register(): void
    {
        $this->app->bind(PostingInterface::class, function ($app) {
            return new VkPosting($app->make('GuzzleHttp\Client'));
        });
    }
}
