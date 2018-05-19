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

Route::match(['get','post'],'/search', 'SolariumController@search')->middleware('auth');

Route::get('/info', function () {
    return view('phpinfo');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/pdf', 'PdfController@showPdf')->middleware('auth');

Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/views', function () {
    return view('views');
});

Route::get('/subscribe', 'SubscribeController@showSubscribeForm');/*function () {
	return view('subscribe');//->middleware('auth')
});*/

Route::post('/subscribe', 'SubscribeController@subscribe');
Route::post('/getBookData', 'SubscribeController@getBookData');

Route::resource('showpdf', 'PdfController' , ['only' => [
		'show'
]]);

Route::get('showswf/{bookName}', 'PdfController@showSwf');

Route::get('/download/{bookName}', 'PdfController@download');

Route::post('/download', 'PdfController@downloadBook');

Route::get("/showSelectedPdf/{bookName}",function($id){
	return view('showSearchPDF')->with('bookName',$id)->with('bookPath','pdf/'.$id);//);
});

// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::post('buybooks','BuyBookController@buybooks');
Route::post('checkout','BuyBookController@checkout');

Route::get('paymentStatus','BuyBookController@paymentStatus');