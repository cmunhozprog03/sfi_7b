<?php

use App\Http\Controllers\ManagerController;
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

Route::resource('/manager', 'ManagerController')->middleware('auth');

Route::any('/setores/search', 'Admin\SectorController@search')->name('setores.search');
Route::resource('/setores', 'Admin\SectorController');

Route::resource('customers','CustomerController');
Route::get('customers/{id}/edit/','CustomerController@edit');


//Route::get('/setores/{id}', 'Admin\SectorController@edit')->name('setores.edit');

Route::resource('/services', 'Admin\ServiceController');
