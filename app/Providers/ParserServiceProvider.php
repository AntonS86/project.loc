<?php


namespace App\Providers;


use App\Services\Parsers\NersParser;
use App\Services\Parsers\ParserInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     *
     */
    public function register(): void
    {
        $this->app->bind(ParserInterface::class, function () {
            return new NersParser();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [ParserInterface::class];
    }
}
