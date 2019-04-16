<?php

namespace App\Providers;


use App\Article;
use App\Category;
use App\Image;
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

        Image::observe(\App\Models\Image\ImageObserver::class);

        parent::boot();

    }
}
