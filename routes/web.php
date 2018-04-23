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
    return view('admin.index');
});


Route::get('/users', 'UsersController@index')->name('usersList');
Route::get('/home', 'HomeController@index')->name('home');



//Managing Rooms Routes

Route::get('/rooms', 'RoomController@index')->name('rooms.index');
Route::get('/rooms/edit/{id}', 'RoomController@edit');
Route::get('/rooms/create', 'RoomController@create');
Route::post('/rooms','RoomController@store');
Route::put('/rooms/update/{id}', 'RoomController@update');
Route::delete('/rooms/delete/{id}', 'RoomController@destroy');

//reservations routes
Route::get('/client', 'ResrvationsController@index')->name('reservation.index');
