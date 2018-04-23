<?php
//Auth Route
Auth::routes();


//Clients Route


Route::get('/users', 'UsersController@index')->name('usersList');
Route::get('/users/show/{id}', 'UsersController@show')->name('usersShow');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('usersEdit');
Route::post('/users/create/{id}', 'UsersController@create')->name('usersCreate');
Route::put('/users/update/{id}', 'UsersController@update')->name('usersUpdate');
Route::delete('/users/delete/{id}', 'UsersController@destroy')->name('usersdelete');


//pending approval
Route::get('/reservations/pending', 'ReservationsController@getPending')->name('');



Route::get('/', function () {
    return view('admin.index');
});


Route::get('/home', 'HomeController@index')->name('home');
