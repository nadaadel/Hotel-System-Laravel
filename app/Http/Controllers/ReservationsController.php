<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Room;
use DB;
use App\Admin;


class ReservationsController extends Controller
{
    //
    public function getPending(){
    //  $usersReservations = User::with('rooms')->get();
    // $roomReservations = Room::with('users')->where('is_confirmed', 0)->get();
    // $reservation = User::with('rooms')->wherePviot('is_confirmed', 0)->get();
     $reservation = User::find(1)->rooms()->where('is_confirmed', 0)->get();

    //$reservation = DB::table('room_user')->where('is_confirmed' , 0)->first();
     dd($reservation);


    }
    public function index()
    {
       $users = User::find(Auth::user()->id);
       $user = User::find(Auth::user()->id);
        return view('reservations.index',
        [
            'reservations' => $users->rooms ,
            'user'=>$user,
        ]);
    }

    public function userReservations()
    {
        $users = User::all();
        $role=Auth::guard('admin')->user();
        
        if($role->hasRole('superadmin')){
            $users = User::all();
            return view('reservations.reservations')->with('reservations',$users);
        }

        elseif ($role->hasRole('receptionist'))
            {
                $users = User::all()->where('registered_by',$role->id); 
                return view('reservations.reservations')->with('reservations',$users); 
            }
            else{
                dd('not allowed, you are not admin or receptionist');
           }         

    }
    

    public function freeRooms(){

       $rooms = Room::all()->where('is_reserved','0');
        return view('reservations.freeRooms',
        [
            'rooms' => $rooms,
        ]);
    }   

    public function create($room_id)
    {
       $room = Room::find($room_id);
        return view('reservations.create',['room'=>$room]);
    }   
    public function store($id,Request $request){
        $request->validate([
            'accompany_number' => 'required|max:'.Room::find($id)->capacity,
        ]);
        $room=Room::find($id);
        if($room->is_reserved){
            return 'Error';
        }     
        $room->is_reserved=1;
        $room->save();
        $user=Auth::user();
        $user->rooms()->attach($user->id,[
        'accompany_number' => $request->accompany_number,
        'client_paid_price'=>$request->price
        ]);
        return redirect('/client/freeRooms'); 
    }
}
