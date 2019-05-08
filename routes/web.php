<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/', 'IndexController', [
    'only'  => ['index'],
    'names' => ['index' => 'home']
]);


Route::post('sendmail', 'SendMailController@store')->name('sendmail.create');

Route::post('work-message', 'WorkMessageController@create')->name('workmessage.create');
Route::put('work-message/{workmessage}', 'WorkMessageController@update')->name('workmessage.update')->where('workmessage', '[0-9]+');

/*---------------------image-uploader*/
Route::post('images-uploader', 'ImagesController@createMany')->name('imagesUploader');
Route::post('image-uploader', 'ImagesController@createOne')->name('imageUploader');

/* ---------------------article--------------------------*/

Route::resource('articles', 'ArticlesController', [
    'only'       => ['index', 'show'],
    'parameters' => [
        'articles' => 'alias'
    ]
]);

Route::get('category/{cat_alias}', 'ArticlesController@category')->name('articles.category')->where('cat_alias', '[\w-]+');

Route::get('keyword/{keyword_alias}', 'ArticlesController@keyword')->name('articlesKeyword')->where('keyword_alias', '[\w-]+');


Route::get('market', 'MarketController@index')->name('market');
/*---------------------Contact----------------------*/

Route::get('contacts', 'ContactController@index')->name('contacts');


/*-------------поиск-по-новостям-и-статьям-ajax-----*/
Route::get('searcharticles', 'SearchController@searchArticles')->name('search.articles_ajax');
Route::post('searchaddress', 'SearchController@searchAddress')->name('search.address');

Route::get('search', 'ArticlesController@search')->name('articles.search');

/*--------------тестовый-контроллер--------------------*/
Route::any('test', 'TestController@test');



/*--------------админ-------------------------*/
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
});
