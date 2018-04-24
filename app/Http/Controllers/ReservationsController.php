<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
       $reservations = DB::table('room_user')->where('user_id', Auth::user()->id)->get();
       // $reservations = User::with('user_id')->get();
     /*  $reservations = User::find(1);
       foreach ($reservations->rooms as $room) {
        dd($room->pivot->accompany_number,$room->pivot->client_paid_price);*/

        return view('reservations.index',
        [
            'reservations' => $reservations
        ]);
    }
}
