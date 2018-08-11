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

Route::get('/', 'Auth\LoginController@getLogin');

Auth::routes();

Route::get('/login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('postLogin', 'Auth\LoginController@postLogin')->name('postLogin');
//Route::get('/restorepassword', 'Controller@getRestorePassword');

Route::get('/transmitionsVw', 'TransmitionController@index');
Route::post('/roles', 'RolesController@store');
Route::post('/programs', 'ProgramController@store');
Route::post('/users', 'UsersController@postUsers');
Route::post('/registerusers', 'UsersController@postRegisterUsers')->name('registerusers');
Route::put('/updateuser/{iduser}/{idemployee}', 'UsersController@putUpdateUsers')->name('updateusers');
Route::get('/destroyusers/{id}', 'UsersController@getDestroyUser')->name('destroyusers');
Route::post('/datetime', 'TransmitionController@show')->name('datetime');

Route::prefix('admin')->group(function () {
   Route::get('/dashboard', 'Controller@getDashboard')->name('dashboard');
   Route::get('/users', 'UsersController@getUsers')->name('users');
   Route::get('usercreate', 'UsersController@getUserCreate')->name('usercreate');
   Route::get('useredit/{id}', 'UsersController@getUserEdit')->name('useredit');
   Route::get('reports/datetimepickers', 'ReportsController@getDateTimePickers')->name('datetimepickers');
   Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
