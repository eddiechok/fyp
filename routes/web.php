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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'ShopController@search')->name('search');

//admin
Route::resource('/product', 'ProductController');
Route::resource('/category', 'CategoryController');
Route::resource('/order', 'OrderController');

//authentication for customers
Auth::routes();

//authentication for admin
Route::get('admin/login', 'Auth\admin\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\admin\LoginController@adminLogin');
Route::post('admin/logout', 'Auth\admin\LoginController@adminLogout')->name('admin.logout');




// Route::get('/mailable', function() {
// 	$order = App\Order::find(2);

// 	return new App\Mail\OrderPlaced($order);
// });
