<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Room;
use App\Floor;
use Auth;
use yajra\Datatables\Datatables;

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
  
    public function create()
    {

        $roles = Admin::find(1)->where(Auth::guard('admin')->user()->id);
   

        $admin = Admin::all();
        $floors = Floor::all();
        $rooms = Room::all();
        return view('rooms.create',[
            'floors' => $floors,
            'roles' => $admin
        ]);
    }

    public function store(StoreRoomRequest $request)
    {
        Room::create([
            'capacity' => $request->capacity,
            'price' => $request->price,
            'number' => $request->number,
            'floor_id' => $request->floor_id,
            'admin_id'=>Auth::guard('admin')->user()->id,
        ]);
        
       return redirect(route('rooms.index')); 
    }



    public function edit($id)
    {
        $floors = Floor::all();
        $roles = Admin::all();
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
        $roles = Admin::all();
        $room = Room::find($id);
        $room->capacity= $request->input('capacity');
        $room->number = $request->input('number');
        $room->price = $request->input('price');
        $room->floor_id=$request->input('floor_id');
        $room->save();


        return redirect()->route('rooms.index');
     }

     public function destroy($id)
     {
         $room = Room::find($id);
         if ($room->is_reserved == 0){
            $room->delete();
            return response()->json(['response' => "success"]);
         }
         else{
            return response()->json(['response' => "the room is reserved"]);
           
               }
     }
 
     public function datatable()
    {
        $rooms = Room::with('admin','floor')->select('rooms.*');
        return Datatables::of($rooms)
            ->addColumn('action', function ($room) {
            $login=Auth::guard('admin')->user();
            if(($login->id==$room->admin_id)||($login->hasRole('superadmin'))){
                $login="yes";
            }
            return view('rooms.action',['id'=>$room->id,'flag'=>$login]);
           })->make(true);
               
         
    }
}
