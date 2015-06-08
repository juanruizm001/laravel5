<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'users' => 'UsersController',
    'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
Route::get('example', function() {

    $user = 'Juan'; //Usaremos la variable $user para pasarla a la vista

    //return View::make('examples.template', compact('user')); //Antes se usaba esta forma para mostrar la vista, pero se cambio por la funcion view
    return view('examples.template', compact('user'));
});
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {

    Route::resource('users', 'UsersController');

});