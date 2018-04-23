<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use DB;


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
}
