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

Route::get('/', 'Controller@getLogin');
Route::get('/login', 'Controller@getLogin');
Route::get('/restorepassword', 'Controller@getRestorePassword');
Route::get('/createacount', 'Controller@getCreateAcount');

Route::get('/dashboard', 'Controller@getDashboard');
Route::get('/userprofile', 'Controller@getUserProfle');
Route::get('/lockscreen', 'Controller@getLockScreen');
Route::get('/logout', 'Controller@getLogOut');
Route::get('/users', 'Controller@getUsers');
Route::get('/reports', 'Controller@getReports');