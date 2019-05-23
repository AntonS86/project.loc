<?php
declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [
        'uses' => 'Admin\IndexController@index',
        'as'   => 'admin.index'
    ]);

    /*-----------редактирование категорий---------------*/
    Route::post('categories', 'Admin\CategoriesController@store')->name('categories.store');
    Route::put('categories', 'Admin\CategoriesController@update')->name('categories.update');
    Route::delete('categories', 'Admin\CategoriesController@destroy')->name('categories.destroy');

    /*----------редактор внешнего вида, слайдеров, меню------------------*/
    Route::get('element', 'Admin\ElementsController@index')->name('element.index');

    /*-----------редактирование статей------------------*/
    Route::resource('articles', 'Admin\ArticlesController');

    /*-----------редактирование объявлений------------------*/
    Route::resource('realestates', 'Admin\RealEstatesController');
    Route::get('realestates/search', 'Admin\RealEstatesController@search')->name('realestates.search');
});
