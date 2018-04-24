<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Floor;
use App\Admin;
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
            'admin_id'=>Auth::guard('admin')->user()->id,
        ]);
       return redirect('floors'); 
    }

    public function datatable()
    {
        $floors = Floor::with('admin')->select('floors.*');
        return Datatables::of($floors)
        ->addColumn('action', function ($floor) {
            if($floor->admin_id==Auth::guard('admin')->user()->id)
            return view('floors.admin-action',['id'=>$floor->id]);
            else 
            return 'You have no actions';
        })
        ->make(true);
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
