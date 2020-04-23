<?php

use App\GeoFile;
use Illuminate\Support\Facades\App;
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
Route::get('/home', 'HomeController@index')->name('home');

//Route::livewire('/geo-file-form/{model?}', 'geo-file-form')->name('geo-file-form');

Route::view('/geo-file', 'admin.geo-file');

Auth::routes();

