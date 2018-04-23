<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function index(){
    $users = User::paginate(4);
    return view('users.list' ,compact('users'));

    }
    public function show($id){
    $user = User::find($id);
    return view('users.show' ,compact('user'));
    }
    public function edit($id){
    $user = User::find($id);
    return view('users.update' ,compact('user'));
    }
    public function update($id , Request $request){
    $user = User::find($id);

    $user->name = $request['name'];
    $user->email = $request['email'];
    $user->gender = $request['gender'];
    $user->phone = $request['phone'];
    $user->country = $request['country'];
    $path = $request->file('avatar')->store('public/uploads');
    dd($path);
    $user->avatar = $path; 
    $user->save();
    return redirect('/users');
    }
    public function destroy($id){
    $user = User::find($id);
    $user->delete();
    return redirect('/users');
    }
}
