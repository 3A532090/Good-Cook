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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');








Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');

    Route::get('/post/add', 'Admin\HomeController@postadd')->name('admin.post.add');

    Route::group(['prefix' => 'member'], function()
    {
        Route::get('/list', 'Admin\MemberController@index')->name('admin.member.list');
    });

    Route::group(['prefix' => 'ingredient'], function()
    {
        Route::get('/list', 'Admin\HomeController@ingredientlist')->name('admin.ingredient.list');
        Route::get('/add', 'Admin\HomeController@ingredientadd')->name('admin.ingredient.add');
        Route::post('/store','Admin\HomeController@ingredientstore')->name('admin.ingredient.store');
    });
});




