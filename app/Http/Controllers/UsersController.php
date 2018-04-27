<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Http\Requests\StoreUserRequest;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Cache;
use App\Notifications\SendWelcomeMail;
use Auth;


class UsersController extends Controller
{
    public function __construct(){

        $this->middleware('auth:admin');
    }
	public function index(){
    //dd(Auth::guard('admin')->user()->hasRole('manager'));
    $users = User::paginate(4);
    return view('users.list' ,compact('users'));

    }
    public function create(){

        $countries = Cache::get('countries');
        return view('users.create' , compact('countries'));
    }
 
    public function editProfile($id){
        $countries = Cache::get('countries');
        $user = User::find($id);
        // dd($user->avatar);
        $avatarName = $user->avatar;
        return view('users.editprofile' ,compact('user' , 'countries' , 'avatarName'));
     }
    public function datatable(){  
    $user = Auth::guard('admin')->user();
    $hasRole =$user->getRoleNames()->first();
    $users = User::select(['id','name','email' , 'phone', 'country' ,'gender','registered_by']);
    
    // if($hasRole == "superadmin"){
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
    // upload image in uploads directory
    $request->file('avatar')->store('public/uploads');
    $avatarName = $request->file('avatar')->hashName();
    $user->avatar = $avatarName; 
    $user->save();
    return redirect('/users');
    }


    public function store(StoreUserRequest $request){
        User::create($request->all());
        return redirect('/users');
        }

    public function destroy($id){
    $user = User::find($id);
    $user->delete();
    return redirect('/users');
    }


    public function approve(){
        return view('users.approve');
    }

    public function data(){
    $users = User::select(['id','name','email','gender','is_registered'])->where('is_registered',0);
    
    return Datatables::of($users)->addColumn('action' , function($user){
        
        return '<a href="/users/approve/'. $user->id.'"  type="button" class="btn btn-warning" >Approve</a>';
        
    })->make(true);

    }
    public function changeapprove($id){
        $user = User::find($id);
        $currentuser=Auth::guard('admin')->user()->id;
        $user->is_registered=1;
        $user->registered_by=$currentuser;
        $user->save();
        $user->notify(new SendWelcomeMail($user));

        return redirect('/users/approve');

    }

}