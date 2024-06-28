<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use App\Models\Category;
use App\Models\Department;

class LeadController extends Controller
{
    public function index()
    {
        {
            $leads = Lead::latest()->paginate(10);
    
            return view('admin.lead.list',compact('leads'));
        }
    
    }


    public function create() 
    {
      $companies = Category::get();
      $departments  = Department::get();
        return view('admin.lead.create',compact('companies','departments'));
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
          'CompanyName' => 'required',
          'Department' => 'required',
          'LeadType' => 'required',
        
        ]);
            
        if ($validator->passes()){

            $lead = new Lead();
            $lead->CompanyName = $request->CompanyName ;
            $lead->Department = $request->Department;
            $lead->LeadType = $request->LeadType ;
            
            $lead->save();
    
            
            return redirect()->route('leads.index');
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

      $leads = Lead::where('id',$id)->first();{

      return view ('admin.lead.edit',['leads' =>$leads]);
      }

      }
    

    public function update(Request $request, $id) 
       {
        $validator = Validator::make($request->all(),[
          'CompanyName' => 'required',
          'Department' => 'required',
          'LeadType' => 'required',

        ]);

        $leads = Lead::where('id',$id)->first();

          $leads->CompanyName = $request->CompanyName ;
          $leads->Department = $request->Department;
          $leads->LeadType = $request->LeadType ;
          
          $leads->save();

          return redirect()->route('leads.index');


       }

  
    

    public function destroy($id){

      $leads  = Lead::where('id',$id)->first();
      $leads ->delete();
      return back()->withSuccess('deleted !!!!!!');
    }

   


 


        
    
      
}
