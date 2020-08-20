<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Subscriptions'], function(){
    Route::get('plans', 'PlanController@index')->name('subscription.plans');
    Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions');
    Route::post('/subscriptions', 'SubscriptionController@store')->name('subscriptions.store');

});


Route::group(['namespace' => 'Account' ,'prefix' => 'account'], function () {
    Route::get('/', 'AccountController@index')->name('account');

    Route::group(['namespace' => 'Subscriptions', 'prefix' => 'subscriptions'], function () {
        Route::get('/', 'SubscriptionController@index')->name('account.subscriptions');

        Route::get('/cancel', 'SubscriptionCancelController@index')->name('account.subscriptions.cancel');
        Route::post('/cancel', 'SubscriptionCancelController@store');
    });
});

