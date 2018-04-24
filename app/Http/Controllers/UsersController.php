<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Cache;



class UsersController extends Controller
{
	public function index(){
    $users = User::paginate(4);
    return view('users.list' ,compact('users'));

    }

    public function datatable(){    
    $users = User::select(['id','name','email','gender']);
    //$users = User::with('admin')->select(['id','name','email','gender']);

    return Datatables::of($users)->addColumn('action' , function($user){
        return '<a href="/users/edit/'. $user->id.'"  type="button" class="btn btn-warning" >Edit</a>
        <form action="/users/delete/'.$user->id.'" 
        onsubmit="return confirm(\'Do you really want to delete?\');" method="post" >'.csrf_field().method_field("Delete").'<input name="_method" value="delete" type="submit" class="btn btn-danger" /></form>';
    })->make(true);
    }

    public function show($id){
    $user = User::find($id);
    return view('users.show' ,compact('user'));
    }
    public function edit($id){
    $countries = Cache::get('countries');
    $user = User::find($id);
    return view('users.update' ,compact('user' , 'countries'));
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