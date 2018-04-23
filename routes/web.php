<?php
//Auth Route
Auth::routes();


//Clients Route
Route::get('/users', 'UsersController@index')->name('usersList');
Route::get('/users/show/{id}', 'UsersController@show')->name('usersShow');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('usersEdit');
Route::post('/users/create/{id}', 'UsersController@create')->name('usersCreate');
Route::put('/users/update/{id}', 'UsersController@update')->name('usersEdit');
Route::delete('/users/delete/{id}', 'UsersController@destroy')->name('usersdelete');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', 'UsersController@index')->name('usersList');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
   // Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
   }) ;