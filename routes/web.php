<?php

//customer
Route::resource('/', 'LandingPageController');
Route::resource('/shop', 'ShopController');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::resource('/cart', 'CartController');
Route::get('/empty', function() {
	Cart::instance('default')->destroy();
});
Route::post('/cart/switchToWishlist/{product}', 'CartController@switchToWishlist')->name('cart.switchToWishlist');
Route::resource('/wishlist', 'WishlistController');
Route::post('/wishlist/switchToCart/{product}', 'WishlistController@switchToCart')->name('wishlist.switchToCart');
Route::resource('/checkout', 'CheckoutController')->middleware('auth');
Route::post('/coupon', 'CouponController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');
Route::view('/thankyou', 'thankyou');

//admin
Route::resource('/product', 'ProductController');
Route::resource('/category', 'CategoryController');
Route::resource('/order', 'OrderController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
