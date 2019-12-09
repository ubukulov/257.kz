<?php
Route::get('/admin/login', 'Admin\AuthController@login')->name('admin.login');
Route::post('/admin/login', 'Admin\AuthController@authenticate')->name('admin.authenticate');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web', 'admin']], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    # Pages
    Route::get('/pages', 'PageController@index')->name('admin.page.index');
    Route::get('/page/create', 'PageController@create')->name('admin.page.create');
    Route::get('/page/{id}/edit', 'PageController@edit')->name('admin.page.edit');
    Route::post('/page/store', 'PageController@store')->name('admin.page.store');
    Route::post('/page/{id}/update', 'PageController@update')->name('admin.page.update');

    # Countries
    Route::get('/countries', 'CountryController@index')->name('admin.country.index');
    Route::get('/country/create', 'CountryController@create')->name('admin.country.create');
    Route::get('/country/{id}/edit', 'CountryController@edit')->name('admin.country.edit');
    Route::post('/country/store', 'CountryController@store')->name('admin.country.store');
    Route::post('/country/{id}/update', 'CountryController@update')->name('admin.country.update');

    # Franchises
    Route::get('/franchises', 'FranchiseController@index')->name('admin.franchise.index');
    Route::get('/franchise/create', 'FranchiseController@create')->name('admin.franchise.create');
    Route::get('/franchise/{id}/edit', 'FranchiseController@edit')->name('admin.franchise.edit');
    Route::post('/franchise/store', 'FranchiseController@store')->name('admin.franchise.store');
    Route::post('/franchise/{id}/update', 'FranchiseController@update')->name('admin.franchise.update');
});