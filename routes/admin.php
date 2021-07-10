<?php

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{




    Route::group(['prefix'=>'admin' , 'namespace' => 'AdminControllers'] , function(){


        Route::get('/login' , 'AdminAuthController@login');
        Route::post('/doLogin' , 'AdminAuthController@doLogin')->name('admin.login');
        Route::any('/logout' , 'AdminAuthController@logout')->name('admin.logout');

        Route::group(['middleware' => 'admin:admin'] , function(){



            Route::get('/' , 'AdminAuthController@index')->name('admin.index');


            // Profile Controller ...
            Route::get('/profile' , 'ProfileController@index')->name('profile.index');
            Route::post('/profile/update' , 'ProfileController@update')->name('profile.update');
            

            // Test Controller ...
            Route::get('/tests' , 'TestController@index')->name('test.index');
            Route::post('/test/store' , 'TestController@store')->name('test.store');




            // Profile Controller ...
            Route::get('/settings' , 'SettingController@index')->name('setting.index');
            Route::post('/settings/update' , 'SettingController@update')->name('setting.update');
            Route::get('/settings/stopComments' , 'SettingController@stopComments')->name('setting.stopComments');
            Route::get('/settings/stopRegisters' , 'SettingController@stopRegisters')->name('setting.stopRegisters');
            Route::get('/settings/stopWebsite' , 'SettingController@stopWebsite')->name('setting.stopWebsite');







            // Categories Controller ...
            Route::get('/categories' , 'CategoryController@index')->name('category.index');
            Route::get('/categories/create' , 'CategoryController@create')->name('category.create');
            Route::post('/categories/store' , 'CategoryController@store')->name('category.store');
            Route::get('/categories/edit/{id}' , 'CategoryController@edit')->name('category.edit');
            Route::post('/categories/update' , 'CategoryController@update')->name('category.update');
            Route::get('/categories/delete/{id}' , 'CategoryController@destroy')->name('category.delete');
            // Get All Categories ..
            Route::get('/categories/all' , 'CategoryController@getAll')->name('category.all');




            // Adminstrators Controller ...
            Route::get('/admins' , 'AdminController@index')->name('admin.admins.index');
            Route::get('/admins/create' , 'AdminController@create')->name('admin.admins.create');
            Route::post('/admins/store' , 'AdminController@store')->name('admin.admins.store');
            Route::get('/admins/edit/{id}' , 'AdminController@edit')->name('admin.admins.edit');
            Route::get('/admins/show' , 'AdminController@show')->name('admin.admins.show');
            Route::post('/admins/update' , 'AdminController@update')->name('admin.admins.update');
            Route::get('/admins/delete/' , 'AdminController@destroy')->name('admin.admins.delete');
            // Get All admins ..
            Route::get('/admins/all' , 'AdminController@getAll')->name('admin.admins.all');






            // Categories Controller ...
            Route::get('/users' , 'UserController@index')->name('user.index');
            Route::get('/users/create' , 'UserController@create')->name('user.create');
            Route::post('/users/store' , 'UserController@store')->name('user.store');
            Route::get('/users/edit/{id}' , 'UserController@edit')->name('user.edit');
            Route::get('/users/show' , 'UserController@show')->name('user.show');
            Route::post('/users/update' , 'UserController@update')->name('user.update');
            Route::get('/users/delete/' , 'UserController@destroy')->name('user.delete');
            // Get All users ..
            Route::get('/users/all' , 'UserController@getAll')->name('user.all');






             // Foods Controller ...
            Route::get('/foods' , 'FoodController@index')->name('food.index');
            Route::get('/foods/create' , 'FoodController@create')->name('food.create');
            Route::post('/foods/store' , 'FoodController@store')->name('food.store');
            Route::get('/foods/edit' , 'FoodController@edit')->name('food.edit');
            Route::post('/foods/update' , 'FoodController@update')->name('food.update');
            Route::get('/foods/delete/{id}' , 'FoodController@destroy')->name('food.delete');
            Route::get('/foods/show' , 'FoodController@show')->name('food.show');
            // Get All Foods ..
            Route::get('/foods/all' , 'FoodController@getAll')->name('food.all');
            // Get All Categories ..
            Route::get('/foods/categories/all' , 'FoodController@getAllCategories')->name('food.category.all');
            // Get Category Name ..
            Route::get('/foods/category/name' , 'FoodController@getCategoryName')->name('food.category.name');
            // Get Category Selected ..
            Route::get('/foods/category/selected' , 'FoodController@getCategorySelected')->name('food.category.selected');





            // Comments Controller ...
            Route::get('/comments' , 'CommentController@index')->name('comment.index');
            Route::get('/comments/create' , 'CommentController@create')->name('comment.create');
            Route::post('/comments/store' , 'CommentController@store')->name('comment.store');
            Route::get('/comments/edit/{id}' , 'CommentController@edit')->name('comment.edit');
            Route::get('/comments/show' , 'CommentController@show')->name('comment.show');
            Route::post('/comments/update' , 'CommentController@update')->name('comment.update');
            Route::get('/comments/delete/{id}' , 'CommentController@destroy')->name('comment.delete');
            // Get All comments ..
            Route::get('/comments/all' , 'CommentController@getAll')->name('comment.all');





            // Message Controller ...
            Route::get('/messages' , 'MessageController@index')->name('message.index');
            Route::get('/messages/create' , 'MessageController@create')->name('message.create');
            Route::post('/messages/store' , 'MessageController@store')->name('message.store');
            Route::get('/messages/show/{id}' , 'MessageController@show')->name('message.show');
            Route::get('/messages/edit/{id}' , 'MessageController@edit')->name('message.edit');
            Route::post('/messages/update' , 'MessageController@update')->name('message.update');
            Route::get('/messages/delete/{id}' , 'MessageController@destroy')->name('message.delete');
            // Get All messages ..
            Route::get('/messages/all' , 'MessageController@getAll')->name('message.all');



            // Slider Controller ...
            Route::get('/sliders' , 'SliderController@index')->name('slider.index');
            Route::get('/sliders/create' , 'SliderController@create')->name('slider.create');
            Route::post('/sliders/store' , 'SliderController@store')->name('slider.store');
            Route::get('/sliders/show' , 'SliderController@show')->name('slider.show');
            Route::get('/sliders/edit/{id}' , 'SliderController@edit')->name('slider.edit');
            Route::post('/sliders/update' , 'SliderController@update')->name('slider.update');
            Route::get('/sliders/delete/{id}' , 'SliderController@destroy')->name('slider.delete');
            // Get All sliders ..
            Route::get('/sliders/all' , 'SliderController@getAll')->name('slider.all');






            // Order Controller ...
            Route::get('/orders' , 'OrderController@index')->name('order.index');
            Route::get('/orders/create' , 'OrderController@create')->name('order.create');
            Route::post('/orders/store' , 'OrderController@store')->name('order.store');
            Route::get('/orders/show/{id}' , 'OrderController@show')->name('order.show');
            Route::get('/orders/edit/{id}' , 'OrderController@edit')->name('order.edit');
            Route::post('/orders/update' , 'OrderController@update')->name('order.update');
            Route::get('/orders/delete/{id}' , 'OrderController@destroy')->name('order.delete');
            Route::get('/orders/active/{id}' , 'OrderController@active')->name('order.active');
            // Get All orders ..
            Route::get('/orders/all' , 'OrderController@getAll')->name('order.all');






        });




});







});
