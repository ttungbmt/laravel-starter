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
Route::redirect('admin', '/home');

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('geo-file', 'GeoFileController');
    Route::get('maps', 'MapController@index');
});

Auth::routes();

