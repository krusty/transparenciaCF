<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('inicio', ['tab' => 'inicio']);
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('consejo', 'ConsejoController@show');
    Route::get('ingresos', 'IngresosController@show');
    Route::get('gastos', 'GastosController@show');
    Route::get('cargar', 'GastosController@new');

    Route::get('auth/google', 'SocialAuthController@redirectToProvider');
    Route::get('auth/google/callback', 'SocialAuthController@handleProviderCallback');
    Route::get('/logout', 'SocialAuthController@logout');

    Route::any('/cargar', 'ConsejoController@cargaGasto');
});
