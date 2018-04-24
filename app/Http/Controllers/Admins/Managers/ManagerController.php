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

class ManagerController extends Controller
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
        $managers=Admin::role('manager')->get();
        return view('managers.index',[
        'managers'=> $managers,
     
       ]);
    }

    public function create()
       {
         
         return view('managers.create');
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
        
         $admin= Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'password'=>Hash::make($request->password),
            'avatar'=>$path,

         ]);
         $admin->assignRole('manager');
         return redirect('managers');
        
       }

       public function show ($id){
        $manager = Admin::where('id', '=', $id)->get()->first();
        return view('managers.show',[
            
            'manager' => $manager,
          
            
        ]);

       }

       public function edit($id)
       {
          $manager=Admin::find($id);
          
        
         return view('managers.edit',[
            
            'manager' => $manager,
            
         ]);
        
       }
   
    
      public function update(UpdateAdminRequest $request,$id)
       {
          $manager = Admin::find($id);
          $file=$request->file('photo');
          
          if ($file){
            $path = $file->store('public/images'); 
          }
         else{
             $path=$manager->avatar;
         }
         

          $manager->update([

            'name' => $request->name,
            'email' => $request->email,
            'national_id'=> $request->national_id,
            'password'=>$request->password,
            'avatar'=>$path,
          ]);
         return redirect(route('managerList'));
       
       }
   
       
        public function destroy($id)
        {
            $manager=Admin::find($id);
            $ManagerAvatar=$manager->avatar;
            Storage::delete($ManagerAvatar);
            Admin::find($id)->delete();
            return redirect(route('managerList'));
          
           
        }
       
    

       
    }
