<?php
//Auth Route
Auth::routes();

use App\User;

//forget password for admin
Route::post('/admin/login/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/login/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/login/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('/admin/login/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('/getrole' , function(){
    dd(Auth::guard('admin')->user()->getRoleNames()->first());
});


//Home Route
Route::get('/', function(){
    return view('welcome');
});
Route::get('/home', 'HomeController@index');
Route::get('/adminpanel', 'HomeController@index');

//Payment Route
Route::get('/reservations/checkout', 'ReservationsController@checkout');
Route::post('/reservations/payment', 'ReservationsController@payment');

//Clients Route
Route::group([

    'middleware'=>'auth'

  
],function(){

Route::get('/users/editprofile/{id}', 'UsersController@editProfile')->name('usersEdit');
Route::get('/client', 'ReservationsController@index')->name('reservation.index');
Route::get('/client/freeRooms', 'ReservationsController@freeRooms');
Route::get('/client/rooms/{room_id}','ReservationsController@create');
Route::post('/client/store/{id}','ReservationsController@store');


});



//admin login routes
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');





Route::group([

    'middleware'=>'auth:admin,forbid-banned-user',

  
],
function () {

    Route::get('/adminpanel', 'HomeController@index')->name('admin.dashboard');
    Route::get('/users/reservations', 'ReservationsController@userReservations');

 //users routes
Route::get('/users', 'UsersController@index')->name('usersList')->where('role','superadmin');
Route::get('/users/create', 'UsersController@create')->name('createUser');
Route::post('/users/store', 'UsersController@store')->name('storeUser');
Route::put('/users/update/{id}', 'UsersController@update')->name('usersUpdate');
Route::delete('/users/delete/{id}', 'UsersController@destroy')->name('usersdelete');
Route::get('/users/datatable', 'UsersController@datatable')->name('userslist');
Route::get('/users/show/{id}', 'UsersController@show')->name('usersShow');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('usersEdit');   
// managers routes
Route::get('/managers', 'Admins\Managers\ManagerController@index')->name('managerList')->where('role','superadmin');
Route::get('/managers/create', 'Admins\Managers\ManagerController@create')->name('managerCreate');
Route::post('/managers', 'Admins\Managers\ManagerController@store');
Route::get('/managers/{id}', 'Admins\Managers\ManagerController@show')->name('managerShow');
Route::get('/managers/{id}/edit', 'Admins\Managers\ManagerController@edit')->name('managerEdit');
Route::put('/managers/{id}', 'Admins\Managers\ManagerController@update')->name('managerUpdate');
Route::delete('/managers/{id}', 'Admins\Managers\ManagerController@destroy')->name('managerdelete');
Route::get('datatable', 'Admins\Managers\ManagerController@datatable');

//receptionists routes

Route::get('/receptionists', 'Admins\Receptionists\ReceptionistController@index')->name('receptionistList');
Route::get('/receptionists/create', 'Admins\Receptionists\ReceptionistController@create')->name('receptionistCreate');
Route::post('/receptionists', 'Admins\Receptionists\ReceptionistController@store');
Route::get('/receptionists/{id}', 'Admins\Receptionists\ReceptionistController@show')->name('receptionistShow');
Route::get('/receptionists/{id}/edit', 'Admins\Receptionists\ReceptionistController@edit')->name('receptionistEdit');
Route::put('/receptionists/{id}', 'Admins\Receptionists\ReceptionistController@update')->name('receptionistUpdate');
Route::delete('/receptionists/{id}', 'Admins\Receptionists\ReceptionistController@destroy')->name('receptionistdelete');
Route::get('data', 'Admins\Receptionists\ReceptionistController@datatable');
Route::get('/receptionists/{id}/ban', 'Admins\Receptionists\ReceptionistController@ban');
Route::get('/receptionists/{id}/ban', 'Admins\Receptionists\ReceptionistController@ban');

//pending page
Route::get('/users/approve','UsersController@approve');
Route::get('/users/data','UsersController@data');
Route::get('/users/approve/{id}','UsersController@changeapprove');




//floors 
Route::delete('/floors/{id}','FloorsController@destroy');
Route::get('/floors', 'FloorsController@index');
Route::get('/floors/create', 'FloorsController@create');
Route::post('/floors/store/{floor_number}', 'FloorsController@store');
Route::get('/floors/edit/{id}', 'FloorsController@edit');
Route::put('/floors/update/{id}', 'FloorsController@update');

Route::get('floors/datatable', 'FloorsController@datatable')->name('floors');

//Managing Rooms Routes
Route::get('/rooms', 'RoomController@index')->name('rooms.index');
Route::get('/rooms/edit/{id}', 'RoomController@edit');
Route::get('/rooms/create', 'RoomController@create');
Route::post('/rooms','RoomController@store');
Route::put('/rooms/update/{id}', 'RoomController@update');
Route::delete('rooms/delete/{id}', 'RoomController@destroy');
Route::get('rooms/datatable', 'RoomController@datatable')->name('rooms');
});

//reservations routes


 