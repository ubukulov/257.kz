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

Route::get('/', 'IndexController@welcome')->name('home');

# Услуги
Route::group(['prefix' => 'services'], function(){
    Route::get('/', 'ServiceController@index')->name('service.index');
    Route::get('/aviabilety', 'ServiceController@aviabilety')->name('service.aviabilety');
    Route::get('/strahovanie', 'ServiceController@strahovanie')->name('service.strahovanie');
    Route::get('/rassrochka', 'ServiceController@rassrochka')->name('service.rassrochka');
    Route::get('/ogranichenie-na-vyezd', 'ServiceController@ogranichenieNaVyezd')->name('service.closed');
    Route::get('/sposoby-oplaty', 'ServiceController@sposobyOplaty')->name('service.pay');
    Route::get('/bonusnaya-karta', 'ServiceController@bonusnayaKarta')->name('service.bonus');
});

# О компании
Route::get('/company', 'CompanyController@about')->name('about.company');

# Горящие туры
Route::get('/hottours/almaty', 'HotController@almaty')->name('hot.almaty');
Route::get('/hottours/nur-sultan', 'HotController@nurSultan')->name('hot.nur-sultan');
Route::get('/hottours/aktobe', 'HotController@aktobe')->name('hot.aktobe');

# Условия франчайзинга
Route::get('/franchising-terms', 'IndexController@franchisingTerms')->name('franchising-terms');

# Страны
Route::get('/countries', 'CountryController@countries')->name('countries');
Route::get('/country/{alias}', 'CountryController@country')->name('country');

# Контакты
Route::get('/contacts', 'PageController@contacts')->name('contacts');

Route::get('/get/hot-tours', 'IndexController@getHotToursList');

Route::post('/city/change', 'IndexController@changeCity');
Route::post('/currency/change', 'IndexController@changeCurrency');

# Отзывы
Route::get('/reviews', 'ReviewController@index')->name('review.index');
Route::post('/reviews', 'ReviewController@store');
Route::post('/reviews/list', 'ReviewController@getReviewList');