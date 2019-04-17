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

Route::resource('sendmail', 'SendMailController', [
    'only'  => ['store'],
    'names' => ['store' => 'sendMail']
]);


Route::post('work-message', 'WorkMessageController@create')->name('workMessage');

Route::post('images-uploader', 'ImagesController@createMany')->name('imagesUploader');
Route::post('image-uploader', 'ImagesController@createOne')->name('imageUploader');

/* ---------------------article--------------------------*/

Route::get('category/{cat_alias}', 'ArticlesController@index')->name('articlesCategory')->where('cat_alias', '[\w-]+');


Route::get('keyword/{keyword_alias}', 'ArticlesController@keyword')->name('articlesKeyword')->where('keyword_alias', '[\w-]+');

Route::get('all-article', 'ArticlesController@all')->name('articlesAll');

Route::get('search', 'ArticlesController@search')->name('searchArticles');

Route::resource('articles', 'ArticlesController', [
    'only'       => ['index', 'show'],
    'parameters' => [
        'articles' => 'alias'
    ]
]);

/*---------------------Contact----------------------*/

Route::get('contacts', 'ContactController@index')->name('contacts');


/*-------------поиск-по-новостям-и-статьям-ajax-----*/
Route::get('searcharticles', 'SearchController@searchArticles')->name('searchArticlesAjax');

/*-------------парсинг--новостей---------------*/
//Route::get('hoovernews', 'HooverNewsController@index')->name('hoovernews');


/*--------------админ-------------------------*/
Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [
        'uses' => 'Admin\IndexController@index',
        'as'   => 'adminIndex'
    ]);

    /*-----------редактирование категорий---------------*/
    Route::post('categories', 'Admin\CategoriesController@store')->name('categories.store');
    Route::put('categories', 'Admin\CategoriesController@update')->name('categories.update');
    Route::delete('categories', 'Admin\CategoriesController@destroy')->name('categories.destroy');

    /*----------редактор внешнего вида, слайдеров, меню------------------*/
    Route::get('elements', 'Admin\ElementsController@index')->name('elements.index');

    /*-----------редактирование статей------------------*/
    Route::resource('articles', 'Admin\ArticlesController');
});
