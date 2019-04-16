<?php

namespace App\Providers;
use DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Rules\CategoryUpdateRule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      /* DB::listen(function ($query) {
            //print '<p>' . $query->sql . '</p>';
            Log::debug('------'.$query->sql.'----------');
            //dump($query->bindings);
       });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
