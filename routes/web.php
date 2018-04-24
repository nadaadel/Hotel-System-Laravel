<?php
//Auth Route
Auth::routes();
Route::get('/', function () {
    return view('admin.index');
});

//Clients Route

Route::get('/users', 'UsersController@index')->name('usersList');
Route::get('/users/show/{id}', 'UsersController@show')->name('usersShow');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('usersEdit');
Route::post('/users/create/{id}', 'UsersController@create')->name('usersCreate');
Route::put('/users/update/{id}', 'UsersController@update')->name('usersUpdate');
Route::delete('/users/delete/{id}', 'UsersController@destroy')->name('usersdelete');

//pending approval
Route::get('/reservations/pending', 'ReservationsController@getPending')->name('');






Route::get('/home', 'HomeController@index')->name('home');

// managers routes
Route::get('/managers', 'Admins\Managers\ManagerController@index')->name('managerList');
Route::get('/managers/create', 'Admins\Managers\ManagerController@create')->name('managerCreate');
Route::post('/managers', 'Admins\Managers\ManagerController@store');
Route::get('/managers/{id}', 'Admins\Managers\ManagerController@show')->name('managerShow');
Route::get('/managers/{id}/edit', 'Admins\Managers\ManagerController@edit')->name('managerEdit');
Route::put('/managers/{id}', 'Admins\Managers\ManagerController@update')->name('managerUpdate');
Route::delete('/managers/{id}', 'Admins\Managers\ManagerController@destroy')->name('managerdelete');


//admin routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->middleware('forbid-banned-admin')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->middleware('forbid-banned-admin')->name('admin.login.submit');
    Route::get('/', 'Admins\AdminController@index')->middleware('forbid-banned-admin')->name('admin.dashboard');
  
   }) ;



//Managing Rooms Routes

Route::get('/rooms', 'RoomController@index')->name('rooms.index');
Route::get('/rooms/edit/{id}', 'RoomController@edit');
Route::get('/rooms/create', 'RoomController@create');
Route::post('/rooms','RoomController@store');
Route::put('/rooms/update/{id}', 'RoomController@update');
Route::delete('/rooms/delete/{id}', 'RoomController@destroy');

//reservations routes
Route::get('/client', 'ReservationsController@index')->name('reservation.index');

