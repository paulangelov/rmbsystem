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

Route::get('/', function () {
    return view('pages.login');
});

Route::post('sign-in', 'LoginCtrl@login'); //form-login

Route::get('sign-out', 'LoginCtrl@logout'); //logout

Route::group(['middleware' => ['checkusersession']], function(){ //session middleware

    Route::get('/home', function () {
        return view('pages.admin-home');
    });

});
