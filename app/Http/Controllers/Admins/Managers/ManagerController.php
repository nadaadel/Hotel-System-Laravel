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
use yajra\Datatables\Datatables;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //to get admins has role manager
        $user=Auth::guard('admin')->user()->id;

        return view('managers.index');
       
    }
    public function piechart()
    {         
        return view('managers.pie-chart');
       
    }


    public function datatable()
    {
        $manager =Admin::role('manager')->select(['id', 'name', 'email']);
        return Datatables::of($manager)
        ->addColumn('action', function ($manager) {
            
            return view('managers.action',['id'=>$manager->id]);
            
        })->make(true);
       
        
    }

    public function create()
       {

         
         return view('managers.create');
       }
   
       public function store(StoreAdminRequest $request)
       {
        $manager =Admin::role('manager')->select(['id', 'name', 'email']);
   
        
        $file=$request->file('photo');
       
        if ($file){
            $path = $file->store('public/uploads'); 
            $pathName =  $request->file('photo')->hashName();
         }
         else{

            $pathName =  'default.png';
            
        }
        
         $admin= Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'password'=>Hash::make($request->password),
            'avatar'=>$pathName,

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
            $path = $file->store('public/uploads'); 
            $pathName =  $request->file('photo')->hashName();
         
          }
         else{
            $pathName=$manager->avatar;
         }
         

          $manager->update([

            'name' => $request->name,
            'email' => $request->email,
            'national_id'=> $request->national_id,
            'password'=>$request->password,
            'avatar'=> $pathName,
          ]);
         return redirect(route('managerList'));
       
       }
   
       
        public function destroy($id)
        {
            $manager=Admin::find($id);
            Admin::find($id)->delete();
            //$ManagerAvatar=$manager->avatar;
            //Storage::delete($ManagerAvatar);
            
            return response()->json(['response' => "success"]);
          
           
        }
       
    

       
    }
