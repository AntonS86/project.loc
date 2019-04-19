<?php

namespace App\Providers;


use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\WorkMessage;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*   Registered::class => [
              SendEmailVerificationNotification::class,
          ], */
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        Article::observe(\App\Models\Article\SlugObserver::class);
        Article::observe(\App\Models\Article\PublishedObserver::class);
        Article::observe(\App\Models\Article\DeleteObserver::class);

        Category::observe(\App\Models\Category\SlugObserver::class);

        Image::observe(\App\Models\Image\DeleteObserver::class);

        WorkMessage::observe(\App\Models\WorkMessage\QueueObserver::class);

        parent::boot();

    }
}
