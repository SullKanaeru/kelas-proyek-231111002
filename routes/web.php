<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'ExampleController@index');

Route::get('/login', 'AuthenticationController@index');
Route::post('/login/new', 'AuthenticationController@log_index');
Route::post('/register', 'AuthenticationController@reg_index');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/add-mahasiswa', 'DashboardController@add_index');
Route::post('/add-mahasiswa/new', 'DashboardController@add_mahasiswa');

Route::get('/edit-mahasiswa/{nrp}', 'DashboardController@edit_index');
Route::post('/edit-mahasiswa/{nrp}/new', 'DashboardController@edit_mahasiswa');

Route::get('/delete-mahasiswa/{nrp}', 'DashboardController@delete_index');

