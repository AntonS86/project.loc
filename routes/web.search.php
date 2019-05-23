<?php
declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::get('searcharticles', 'SearchController@searchArticles')->name('search.articles_ajax');


Route::post('searchregion', 'SearchController@searchRegion')->name('search.region');
Route::post('searcharea', 'SearchController@searchArea')->name('search.area');
Route::post('searchcity', 'SearchController@searchCity')->name('search.city');
Route::post('searchdistrict', 'SearchController@searchDistrict')->name('search.district');
Route::post('searchstreet', 'SearchController@searchStreet')->name('search.street');
Route::post('searchvillage', 'SearchController@searchVillage')->name('search.village');
