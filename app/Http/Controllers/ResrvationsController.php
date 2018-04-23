<?php

namespace App\Http\Controllers;
use App\User;
use App\Room;
use DB;
use Illuminate\Http\Request;

class ResrvationsController extends Controller
{
    public function index()
    {
       $reservations = DB::table('room_user')->get();
       // $reservations = User::with('user_id')->get();
     /*  $reservations = User::find(1);
       foreach ($reservations->rooms as $room) {
        dd($room->pivot->accompany_number,$room->pivot->client_paid_price);*/
   
        return view('reservation.index',
        [
            'reservations' => $reservations
        ]);
    }
}
