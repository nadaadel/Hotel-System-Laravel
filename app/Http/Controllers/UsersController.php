<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function index(){
    // $users = User::all();
    // return view('users.list' ,compact('users'));
    return view('users.list');

    }
    public function show($id){
    $user = User::find($id);
    return view('users.show' ,compact('user'));
    }
    public function edit($id){
    $user = User::find($id);
    return view('users.edit' ,compact('user'));
    }
    public function update($id){
    $user = User::find($id);
    //$user->//param
    return view('users.list');
    }
    public function destroy($id){
    $user = User::find($id);
    $user->delete();
    return view('users.list');
    }
}
