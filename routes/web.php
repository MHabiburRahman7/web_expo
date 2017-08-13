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

Route::get('/berkas', 'BerkasController@index');
Auth::routes();
Route::group(['middleware' => 'App\Http\Middleware\RevokeDataMiddleware'], function()
{
	Route::get('/profile','ProfileController@index');
	Route::post('/profile','ProfileController@create');
});
Route::group(['middleware' => 'App\Http\Middleware\DataMiddleware'], function()
{
	Route::group(['middleware' => 'App\Http\Middleware\RevokePaymentMiddleware'], function()
	{
		Route::get('/payment','PaymentController@index');
		Route::post('/payment','PaymentController@create');
	});
	Route::group(['middleware' => 'App\Http\Middleware\PaymentMiddleware'], function()
	{
		Route::get('/', 'HomeController@index');
		Route::get('/user', 'AnggotaController@index');
	});
});