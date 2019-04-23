<?php


namespace App\Providers;


use App\Http\View\Composers\AdminComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{


    public function boot()
    {
        View::composer([
            'new_admin.index',
            'new_admin.article',
            'new_admin.element'
        ], AdminComposer::class);
    }

}
