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



4- Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	

	// Start Languages Routes ...


	Route::get('/', 'UserAuthController@index')->name('page.index');

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');


	// Pages Controller ..
	Route::get('/about' , 'PagesController@about')->name('page.about');
	Route::get('/contact' , 'PagesController@contact')->name('page.contact');
	Route::get('/services' , 'PagesController@services')->name('page.services');

	// Meals Controller ....
	Route::get('/meals' , 'MealsController@index')->name('page.meals');
	Route::get('/meals/show/{id}' , 'MealsController@show')->name('page.meals.show');

	// Meals Categoris ..
	Route::get('/meals/category/{id}' , 'MealsController@category')->name('meal.category');

	Route::get('/register' , 'MyRegisterControler@index')->name('user.register');
	Route::post('/doRegister' , 'MyRegisterControler@doRegister')->name('user.doRegister');

	Route::get('/login' , 'MyLoginController@index')->name('user.login');
	Route::post('/doLogin' , 'MyLoginController@doLogin')->name('user.doLogin');
	Route::any('/logout' , 'MyLoginController@logout')->name('user.logout');


	// Add Comment ..
	Route::post('/add/comment/{id}' , 'CommentController@store')->name('user.comment');


	// Make Order ...
	Route::get('/add/order/{id}' , 'OrderController@store')->name('user.order');


	// Sending Message ...
	Route::post('/send/message' , 'MessageController@store')->name('user.message');


	// Profile ....
	Route::get('/profile' , 'ProfileController@index')->name('user.profile');
	Route::post('/profile/update' , 'ProfileController@update')->name('user.profile.update');

	// My Orders ...
	Route::get('/myorders' , 'OrderController@index')->name('user.myorder');
	Route::get('/myorders/show/{id}' , 'OrderController@show')->name('user.myorder.show');
	Route::get('/myorders/delete/{id}' , 'OrderController@destroy')->name('user.myorder.delete');


});