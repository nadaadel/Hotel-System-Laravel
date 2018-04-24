<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Floor;
use yajra\Datatables\Datatables;

class FloorsController extends Controller
{

    public function create (){
        return view('floors.create',['floor_number'=>$this->generateFloorNumber()]); 
    }

    public function store($floor_number,Request $request){
        $request->validate([
            'name'=>'required|min:3',
        ]);
        Floor::create([
            'number' => $floor_number,
            'name' => $request->name,
            'admin_id'=>Auth::user()->id,
        ]);
       return redirect('floors'); 
    }

    public function datatable()
    {
        $floors = Floor::with('admin')->select(['id', 'name', 'number']);
        return Datatables::of($floors)
        ->addColumn('action', function ($floor) {
            return '<a href="/floors/edit/'. $floor->id.'"  type="button" class="btn btn-warning" >Edit</a>
            <form action="floors/delete/'.$floor->id.'" 
            onsubmit="return confirm(\'Do you really want to delete?\');" method="post" >'.csrf_field().method_field("Delete").'<input name="_method" value="delete" type="submit" class="btn btn-danger" /></form>';
        })->make(true);
    }
    
    public function index (){ 
        return view('floors.index');
     }

    public function edit($id){
        $floor=Floor::find($id);
        return view('floors.update',['floor'=> $floor] );
    }

    public function update($id, Request $request){
        $request->validate([
            'name'=>'required|min:3',
        ]);
        $floor= Floor::find($id);
        $floor->name=$request->name;
        $floor->save();
        return redirect('floors'); 
     }

    public function destroy($id){
        $floor=Floor::find($id);
        $floor->delete();
        return redirect('floors'); 
    }
    
    function generateFloorNumber() {
        $number = mt_rand(1000, 9999); 
        if ($this->floorNumberExists($number)) {
            return generateFloorNumber();
        }
        return $number;
    }
    
    function floorNumberExists($number) {
        return Floor::where('number',$number)->exists();
    }
}
