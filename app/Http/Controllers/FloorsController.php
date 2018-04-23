<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;

class FloorsController extends Controller
{
    public function create (){
       //$number=$this->generateFloorNumber();
        //Floor::create()
        
    }
    public function store(Request $request){
        Floort::create([
            'number' => $this->generateFloorNumber(),
            'name' => $request->name,
            'role_id'=>Auth::user()->id,
        ]);
       return redirect('floors'); 
        

    }
    public function index (){ 
        $allFloors=Floor::all();  
        return view('floors.index',['floors'=>$allFloors]);
     }

     public function update($id, Request $request){
        $request->validate([
            'name'=>'required|min:10',
        ]);
        $floor= Floor::find($id);
        $floor->name=$request->name;
        $floor->save();
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
