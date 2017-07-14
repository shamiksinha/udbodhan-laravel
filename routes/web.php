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
    return view('udb_home');
});

Route::get('/about', function () {
    return view('about');
});

/* Route::get('/home', function () {
    return view('udb_home');
}); */

Route::get('/ping', 'SolariumController@ping');

Route::match(['get','post'],'/search', 'SolariumController@search');

Route::get('/info', function () {
    return view('phpinfo');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/pdf', 'PdfController@showPdf');

Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/views', function () {
    return view('views');
});

Route::get('/subscribe', function () {
    return view('subscribe');
});