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
use Gloudemans\Shoppingcart\Facades\Cart;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('crud', 'CRUDController');
Route::resource('pages', 'LandingPageController');
Route::get('/landing-page', 'LandingPageController@index')->name('landing-page');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');

Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::delete('/SaveForLater/{product}','SaveForLaterController@destroy')->name('SaveForLater.destroy');
Route::post('/SaveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('SaveForLater.switchToCart');

Route::get('/checkout','ChekoutController@index')->name('checkout.index');

Route::post('/checkout','ChekoutController@store')->name('checkout.store');

Route::get('/thankyou','ConfirmationController@index')->name('confirmation.index');

Route::post('/coupon','CouponsController@store')->name('coupon.store');
Route::delete('/coupon','CouponsController@destroy')->name('coupon.destroy');

Route::get('empty', function(){Cart::destroy();});
Auth::routes();

Route::get('search','ShopController@search')->name('search');

Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
