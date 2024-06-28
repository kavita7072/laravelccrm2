<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ClientManage;
use App\Models\Employee;
use App\Models\Products;





class clientManageController extends Controller

{
    public function index()
    
        {
          $clientmanages = ClientManage::latest()->paginate(10);
         
    
            return view('admin.clientmanage.list',compact('clientmanages'));
        }

        
        public function create() 

    {
       $data = Products::get();
       $emp =  Employee::get();
      

        return view('admin.clientmanage.create',compact('data' ,'emp'));
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
          'Name' => 'required',
          'Emailid' => 'required',
          'ContactNo' => 'required',
          'ComapanyDetails' => 'required',
          'Address' => 'required',
          'GSTNo' => 'required',
          'Product' => 'required',
          'EmployeeName' => 'required',
        
        
        ]);
            
        if ($validator->passes()){

            $clientmanage = new ClientManage();
            $clientmanage->Name = $request->Name ;
            $clientmanage->Emailid = $request->Emailid ;
            $clientmanage->ContactNo = $request->ContactNo ;
            $clientmanage->ComapanyDetails = $request->ComapanyDetails;
            $clientmanage->Address = $request->Address;
            $clientmanage->GSTNo = $request->GSTNo;
            $clientmanage->Product = $request->Product;
            $clientmanage->EmployeeName = $request->EmployeeName;
            $clientmanage->save();
            
            
    
    
            
          
            return response()->json(
              [
                'status' => true,
                'message'=> 'Lead added successfully'
                
      ]
        );

       
       }else{
        return response()->json([
              'status' => false,
              'errors'=> $validator->errors()
        ]);
       } 
       
    } 
    public function edit($id){

      $clientmanages = ClientManage::where('id',$id)->first();{

      return view ('admin.clientmanage.edit',['clientmanages' =>$clientmanages]);

      }
    }

    public function update(Request $request, $id) 
    
      {
        $validator = Validator::make($request->all(),[
          'Name' => 'required',
          'Emailid' => 'required',
          'ContactNo' => 'required',
          'ComapanyDetails' => 'required',
          'Address' => 'required',
          'GSTNo' => 'required',
          'Product' => 'required',
          'EmployeeName' => 'required',
        
        
        ]);
    
        $clientmanage = ClientManage::where('id',$id)->first();
              
            
            $clientmanage->Name = $request->Name ;
            $clientmanage->Emailid = $request->Emailid ;
            $clientmanage->ContactNo = $request->ContactNo ;
            $clientmanage->ComapanyDetails = $request->ComapanyDetails;
            $clientmanage->Address = $request->Address;
            $clientmanage->GSTNo = $request->GSTNo;
            $clientmanage->Product = $request->Product;
            $clientmanage->EmployeeName = $request->EmployeeName;
            $clientmanage->save();
  
      
        return redirect()->route('clientmanages.index');
      
      }
    

    public function destroy($id){

      $clientmanages =  ClientManage::where('id',$id)->first();
      $clientmanages ->delete();
      return back()->withSuccess('deleted !!!!!!');
    }




 
  

      

   
}

   