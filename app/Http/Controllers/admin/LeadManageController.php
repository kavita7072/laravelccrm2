<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LeadManage;
use App\Models\Products;
use App\Models\Employee;
use App\Models\ClientManage;


class LeadManageController extends Controller
{
  
    public function index()
    
        {
            $leadmanages = LeadManage::latest()->paginate(10);
            $clientmanage = ClientManage::all();


            return view('admin.leadmanage.list',compact('leadmanages','clientmanage'));
            

        }

        public function create() 
        {
          $data = Products::all();
          $text = Employee::all();
        
          

            return view('admin.leadmanage.create',compact('data','text'));
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

            $leadmanage = new LeadManage();
            $leadmanage->Name = $request->Name ;
            $leadmanage->Emailid = $request->Emailid ;
            $leadmanage->ContactNo = $request->ContactNo ;
            $leadmanage->ComapanyDetails = $request->ComapanyDetails;
            $leadmanage->Address = $request->Address;
            $leadmanage->GSTNo = $request->GSTNo;
            $leadmanage->Product = $request->Product;
            $leadmanage->EmployeeName = $request->EmployeeName;
            $leadmanage->save();
            
            
    
    
            
          
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

      $leadmanages =  Leadmanage::where('id',$id)->first();{

      return view ('admin.leadmanage.edit',['leadmanages' => $leadmanages]);

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
            
      
        $leadmanage = LeadManage::where('id',$id)->first();
          
            $leadmanage->Name = $request->Name ;
            $leadmanage->Emailid = $request->Emailid ;
            $leadmanage->ContactNo = $request->ContactNo ;
            $leadmanage->ComapanyDetails = $request->ComapanyDetails;
            $leadmanage->Address = $request->Address;
            $leadmanage->GSTNo = $request->GSTNo;
            $leadmanage->Product = $request->Product;
            $leadmanage->EmployeeName = $request->EmployeeName;
            $leadmanage->save();
    
        
          return redirect()->route('leadmanages.index');
        
        }
 
       

  
    

    public function destroy($id){

      $leadmanages =  Leadmanage::where('id',$id)->first();
      $leadmanages->delete();
      return back()->withSuccess('deleted !!!!!!');
    }

   



}
