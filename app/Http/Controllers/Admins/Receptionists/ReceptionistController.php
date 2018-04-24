<?php

namespace App\Http\Controllers\Admins\Managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Storage;
use App\Admin;
uSE Auth;

class ReceptionistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //to get admins has role manager
        $receptionists=Admin::role('receptionist')->get();
        return view('receptionists.index',[
        'receptionists'=> $receptionist,
     
       ]);
    }

    public function create()
       {
         
         return view('receptionists.create');
       }
   
       public function store(StoreAdminRequest $request)
       {
        
        $file=$request->file('photo');
       
        if ($file){
            $path = $file->store('public/images'); 
         }
         else{
            $path="public/images/12.jpg";
        }
        
         $receptionist= Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'password'=>Hash::make($request->password),
            'avatar'=>$path,

         ]);
         $receptionist->assignRole('receptionist');
         return redirect('receptionists');
        
       }

       public function show ($id){
        $receptionist = Admin::where('id', '=', $id)->get()->first();
        return view('receptionists.show',[
            
            'receptionist' => $receptionist,
          
            
        ]);

       }

       public function edit($id)
       {
          $receptionist=Admin::find($id);
          
        
         return view('receptionists.edit',[
            
            'receptionist' => $receptionists,
            
         ]);
        
       }
   
    
      public function update(UpdateAdminRequest $request,$id)
       {
          $receptionist= Admin::find($id);
          $file=$request->file('photo');
          
          if ($file){
            $path = $file->store('public/images'); 
          }
         else{
             $path=$receptionist->avatar;
         }
         

         $receptionist->update([

            'name' => $request->name,
            'email' => $request->email,
            'national_id'=> $request->national_id,
            'password'=>$request->password,
            'avatar'=>$path,
          ]);
         return redirect(route('receptionistList'));
       
       }
   
       
        public function destroy($id)
        {
            $receptionist=Admin::find($id);
            $ReceptionistAvatar=$receptionist->avatar;
            Storage::delete( $ReceptionistAvatar);
            Admin::find($id)->delete();
            return redirect(route('receptionistList'));
          
           
        }
       
    

       
    }
