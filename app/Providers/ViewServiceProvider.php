<?php


namespace App\Providers;


use App\Http\View\Composers\AdminComposer;
use App\Http\View\Composers\SearchRealestateComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{


    public function boot()
    {
        View::composer([
            'new_admin.index',
            'new_admin.article',
            'new_admin.element',
            'new_admin.realestate'
        ], AdminComposer::class);

        View::composer([
            'new_admin.realestate'
        ], SearchRealestateComposer::class);
    }

}
