<?php
//Auth Route
Auth::routes();

// Clients Route
Route::get('/', 'HomeController@index');
Route::get('/reservations/checkout', 'CheckoutController@checkout');
Route::post('/reservations/payment', 'CheckoutController@payment');



Route::get('/users', 'UsersController@index')->name('usersList');
Route::get('/users/show/{id}', 'UsersController@show')->name('usersShow');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('usersEdit');
Route::post('/users/create/{id}', 'UsersController@create')->name('usersCreate');
Route::put('/users/update/{id}', 'UsersController@update')->name('usersUpdate');
Route::delete('/users/delete/{id}', 'UsersController@destroy')->name('usersdelete');


//pending approval
Route::get('/reservations/pending', 'ReservationsController@getPending')->name('');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
   // Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
   }) ;

//Managing Rooms Route

Route::get('/rooms', 'RoomController@index')->name('rooms.index');
Route::get('/rooms/edit/{id}', 'RoomController@edit');
Route::get('/rooms/create', 'RoomController@create');
Route::post('/rooms','RoomController@store');
Route::put('/rooms/update/{id}', 'RoomController@update');
Route::delete('/rooms/delete/{id}', 'RoomController@destroy');

//reservations routes
Route::get('/client', 'ReservationsController@index')->name('reservation.index');

