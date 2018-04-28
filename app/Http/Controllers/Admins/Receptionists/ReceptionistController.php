<?php

namespace App\Http\Controllers\Admins\Receptionists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Storage;
use App\Admin;
use Auth;
use yajra\Datatables\Datatables;

class ReceptionistController extends Controller

{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //to get admins has role manager
        
        return view('receptionists.index');
       
    }
   

    public function datatable()
    {   
        
        $receptionists =Admin::role('receptionist')->select(['id', 'name', 'email','created_at','created_by','banned_at']);

        return Datatables::of($receptionists)
        ->addColumn('action', function ($receptionists) {

            $receptionist=Admin::find($receptionists->id);
            $manager=Admin::find($receptionists->created_by);
        
            $loginname=Auth::guard('admin')->user();
            if(($loginname->id==$manager->id)||($loginname->hasRole('superadmin'))){
                $loginname="yes";
            }
            return view('receptionists.action',['id'=>$receptionists->id,'role'=>$loginname,'receptionist'=>$receptionist]);
           
            //return('data');
            
        })
        ->addColumn('managername', function ($receptionists) {
                
          
            $manager=Admin::find($receptionists->created_by);
            $loginname=Auth::guard('admin')->user();
            if($loginname->hasRole('superadmin')){
                return view('receptionists.managername',['name'=>  $manager->name]);
            }
            
            
        })->make(true);
        
        
       
        
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
         $currentlogin=Auth::guard('admin')->user();
        
         $receptionist= Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'password'=>Hash::make($request->password),
            'created_by'=>$currentlogin->id,
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
            
            'receptionist' => $receptionist,
            
         ]);
        
       }
   
    
      public function update(UpdateAdminRequest $request,$id)
       {
        $receptionist = Admin::find($id);
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
            $receptionistAvatar=  $receptionist->avatar;
            Storage::delete($receptionistAvatar);
            Admin::find($id)->delete();
            Storage::delete($receptionistAvatar);
            return response()->json(['response' => "success"]);
          
           
        }

        function ban($id){
            $receptionist=Admin::find($id);
            if (!$receptionist->isBanned())
            {
                $receptionist->ban();
            }
            else{
                $receptionist->unban();
            }
            
            return redirect(route('receptionistList'));
        }
        
       
    

       
    }
