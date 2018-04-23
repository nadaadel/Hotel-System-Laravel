<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Room;
use App\Floor;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index',
        [
            'rooms' => $rooms
        ]);
    }
    
    public function generateRoomNumber(){
        $number=mt_rand(1000,9999);
        if($this->RoomNumberExists($number)){
            return generateRoomNumber();
        }
        return $number;
    }
    public function RoomNumberExists($number){
        return Room::where('number',$number)->exists();
    }
    
    public function create()
    {
        $roles = Role::all();
        $floors = Floor::all();
        $rooms = Room::all();
        return view('rooms.create',[
            'floors' => $floors,
            'roles' => $roles
        ]);
    }

    public function store(StoreRoomRequest $request)
    {
        
        Room::create([
            'capacity' => $request->capacity,
            'price' => $request->price,
            'number' => $this->generateRoomNumber(),
            'floor_id' => $request->floor_id,
            'created_by'=>$request->created_by,
        ]);
        
       return redirect(route('rooms.index')); 
    }



    public function edit($id)
    {
        $floors = Floor::all();
        $roles = Role::all();
        if($id != " "){
           $room = Room::find($id);
           if ( $room){
                return view('rooms.edit',[ 'room' => $room , 'floors' => $floors,'roles' => $roles]);
           }
        }
    }

    public function update(StoreRoomRequest $request, $id)
    {
     
        $users = User::all();
        $roles = Role::all();
        $room = Room::find($id);

        $room->capacity= $request->input('capacity');
        $room->price = $request->input('price');
        $room->floor_id=$request->input('floor_id');
        $room->created_by=$request->input('created_by');

        $room->save();


        return redirect()->route('rooms.index');
     }

     public function destroy($id)
     {
         $room = Room::find( $id );
 
         $room->delete();
         
         
         return redirect()->route('rooms.index');
     }
 
 
}
