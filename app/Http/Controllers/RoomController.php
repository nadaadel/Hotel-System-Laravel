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
            //'number' => $this->generateRoomNumber(),
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

     public function destroy(Request $request)
     {
        //dd($request);
         $room = Room::find( $request->roomID );
        // dd($room);
         if ($room->is_reserved ==0){
            $room->delete();
            return response()->json(['response' => "success"]);
         }
         else{
            return response()->json(['response' => "failed"]);
               }
     }
 
     public function datatable()
    {
        $rooms = Room::with('admin','floor')->select('rooms.*');
        return Datatables::of($rooms)
            ->addColumn('action', function ($room) {
                return '<a href="/rooms/edit/'. $room->id.'"  type="button" class="btn btn-warning" >Edit</a>
                <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash deletebtn" room-id="'.$room->id.'" {{ csrf_token() }}> Delete </i> </a>;  ';
            })->make(true);
    }
}
