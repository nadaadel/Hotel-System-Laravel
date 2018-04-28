<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Room;
use DB;
use App\Admin;
use App\Rules\RoomCapacityRule;
//use Auth;


class ReservationsController extends Controller
{

    
    public function getPending(){
  
     $reservation = User::find(1)->rooms()->where('is_confirmed', 0)->get();

  
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
                $user = Auth::guard('admin')->user();
                $users = User::all()->where('registered_by',$role->id); 
                return view('reservations.reservations' , ['reservations' =>$users ,
                'user' =>$user]
            );
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
    public function freeRooms_datatable()
    {        
        $rooms = Room::all()->where('is_reserved','0');
        return Datatables::of($rooms)
        ->addColumn('action', function ($room) {  
            return view('reservations.make-action',['id'=>$room->id]);
        })->make(true);
    }

    public function create($room_id)
    {
       $room = Room::find($room_id);
        return view('reservations.create',['room'=>$room]);
    }   

    public function store($id,Request $request){

        $request->validate([
            'accompany_number' => ['required',new RoomCapacityRule(Room::find($id)->capacity)],
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
        'client_paid_price'=>$room->price,
        'is_confirmed' => 1
        ]);

        return redirect('/client'); 
    }
}
