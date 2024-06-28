<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Category;
use App\Models\Department;




class EmployeeController extends Controller
{


    public function index()
     {
        $employee = Employee::latest()->paginate(10);

        return view('admin.employees.list',compact('employee'));
    }

    public function create()
    {
      $companies = Category::get();
      $departments  = Department::get();
    

        return view('admin.employees.create',compact('companies', 'departments'));

      


    

      
   }

   
   public function store(Request $request) {
        
    $validator = Validator::make($request->all(),[
      'company' => 'required',
      'department' => 'required',
      'address' => 'required',                
      'Name' => 'required',
      'contactno' => 'required',
      'guardian' => 'required',
      'guardianno' => 'required', 

    
        

       ]);

       

        if ($validator->passes()){

            $employee = new Employee();
            $employee->company = $request->company;
            $employee->department = $request->department;
            $employee->address = $request->address;
            $employee->Name = $request->Name;
            $employee->contactno = $request->contactno;
            $employee->guardian = $request->guardian;
            $employee->guardianno = $request->guardianno;
            $employee->save();
           
            
    
           
           
            //$request->session()->flash('success','company added successfully');
            return redirect()->route('employee.index');
            return response()->json(
              [
                'status' => true,
                'message'=> 'company added successfully'
                
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

      $employee  =  Employee::where('id',$id)->first();{

      return view ('admin.employees.edit',['employee'=> $employee ]);

      }
    }

    public function update(Request $request, $id) 
       {
      
        $validator = Validator::make($request->all(),[
      'company' => 'required',
      'department' => 'required',
      'address' => 'required',                
      'Name' => 'required',
      'contactno' => 'required',
      'guardian' => 'required',
      'guardianno' => 'required', 

          
        
        ]);
    
        $employee = Employee::where('id',$id)->first();
        
        $employee->company = $request->company;
        $employee->department = $request->department;
        $employee->address = $request->address;
        $employee->Name = $request->Name;
        $employee->contactno = $request->contactno;
        $employee->guardian = $request->guardian;
        $employee->guardianno = $request->guardianno;
        $employee->save();
       
  
      
        return redirect()->route('employee.index');
      
       }

  
    

    public function destroy($id){

      $employee  = Employee::where('id',$id)->first();
      $employee ->delete();
      return back()->withSuccess('deleted !!!!!!');
    }

   

    
    
}


