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

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('home');

Route::get('realestates/{realestate}', 'RealEstateController@show')->name('realestates.show');
Route::get('realestates/search', 'RealEstateController@search')->name('realestates.search');
Route::get('realestate/favorite-toggle/{realestate}', 'RealEstateController@favToggle')->name('realestate.fav_toggle');

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

require __DIR__ . '/web.search.php';



Route::get('search', 'ArticlesController@search')->name('articles.search');

/*--------------тестовый-контроллер--------------------*/
Route::any('test', 'TestController@test');



/*--------------админ-------------------------*/

require __DIR__ . '/web.auth.php';
