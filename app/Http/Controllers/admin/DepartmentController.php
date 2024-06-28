<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Department;
use App\Models\Category;


class DepartmentController extends Controller
{
    public function index() 
    {
        $department = Department::latest()->paginate(10);

        return view('admin.department.list',compact('department'));

        
    }



    public function create() 
    {
      $companies = Category::get();

        return view('admin.department.create'); 
    }

    public function store(Request $request) 
    {

      //dd( $request->all());

      
      $validator = Validator::make($request->all(),[
        'Company_Name' => 'required',
        'Department_Name' => 'required',
        'Department_Description' => 'required',
         ]);

         
         

         if ($validator->passes()){

          $department  = new Department();
          $department ->Company_Name = $request->Company_Name;
          $department ->Department_Name = $request->Department_Name;
          $department ->Department_Description = $request->Department_Description;
          $department ->Action = $request->Action;
          $department ->save();


          return redirect()->route('department.index');
          return response()->json(
              [
                'status' => true,
                'message'=> 'Department added successfully',
                
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

      $department =  Department::where('id',$id)->first();{

      return view ('admin.department.edit',['department' => $department]);

      }
    }

    public function update(Request $request, $id) 
       {
        
      

          $validator = Validator::make($request->all(),[
            'Company_Name' => 'required',
            'Department_Name' => 'required',
            'Department_Description' =>'required',
  
        ]);
    
        $department = Department::where('id',$id)->first();
              
          
        
        $department ->Company_Name = $request->Company_Name;
        $department ->Department_Name = $request->Department_Name;
        $department ->Department_Description = $request->Department_Description;
        $department ->save();

  
  
      
        return redirect()->route('department.index');
      
      
      }
       

  
    

    public function destroy($id){

      $department = Department::where('id',$id)->first();
      $department->delete();
      return back()->withSuccess('deleted !!!!!!');
    }

   


   
    
    
  }   
       



  






