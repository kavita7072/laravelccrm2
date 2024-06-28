<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;



class CategoryController extends Controller
{
    public function index() {
         $categories = Category::latest()->paginate(10);

         return view('admin.category.list',compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
          'CompanyName' => 'required',
          'Address' => 'required',
          'Website' => 'nullable',
          'Email' => 'required',
          'GSTIN' => 'required',
          'Contact' => 'required',
          
        ]);

          
  
            
    
          

         

            if ($validator->passes()){
              
                 $category = new Category();
                $category->CompanyName = $request->CompanyName;
                $category->Address = $request->Address;
                $category->Website = $request->Website;
                $category->Email = $request->Email;
                $category->GSTIN = $request->GSTIN;
                $category->Contact = $request->Contact;
                $category->save();
        
                //$request->session()->flash('success','company added successfully');
                return redirect()->route('categories.index');
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

          $categories = Category::where('id',$id)->first();{
    
          return view ('admin.category.edit',['categories' =>$categories]);
    
          }
        }

        public function update(Request $request, $id) 
        
        {
          $validator = Validator::make($request->all(),[
            'CompanyName' =>'required',
            'Address' => 'required',
            'Website' => 'nullable',
            'Email' => 'required',
            'GSTIN' => 'required',
            'Contact' => 'required',
            
          
          ]);
      
          $categories = Category::where('id',$id)->first();
                
          $categories->CompanyName = $request->CompanyName;
          $categories->Address = $request->Address;
          $categories->Website = $request->Website;
          $categories->Email = $request->Email;
          $categories->GSTIN = $request->GSTIN;
          $categories->Contact = $request->Contact;
          $categories->save();
    
        
          return redirect()->route('categories.index');
        
        }
 
        public function destroy($id){

          $categories =  Category::where('id',$id)->first();
          $categories ->delete();
        return back()->with('message','Company successful add');
         // return redirect()->back() ->with('alert', 'delete!');


        }
    
    


     
      

          

              
}