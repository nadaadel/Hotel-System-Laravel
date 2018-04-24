<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Room;
use DB;
use Auth;


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
<<<<<<< HEAD
       $reservations = DB::table('room_user')->where('user_id', Auth::user()->id)->get();
       // $reservations = User::with('user_id')->get();
     /*  $reservations = User::find(1);
=======
       $reservations = DB::table('room_user')->get();
      // $reservations = User::with('user_id')->get();
       $reservations = User::find(1);
>>>>>>> a8c136f2b314e1a53fa7f3327ad2dcdc93c1645c
       foreach ($reservations->rooms as $room) {
        dd($room->pivot->accompany_number,$room->pivot->client_paid_price);

<<<<<<< HEAD
        return view('reservations.index',
=======
       }
               return view('reservations.index',
>>>>>>> a8c136f2b314e1a53fa7f3327ad2dcdc93c1645c
        [
            'reservations' => $reservations
        ]);
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
            return 'hh';
        }     
        $room->save();
        $user=Auth::user();
        $user->rooms()->attach($user->id,[
        'accompany_number' => $request->accompany_number,
        'client_paid_price'=>$request->price
        ]);
        return redirect('/reservations/freeRooms'); 
    }
}
