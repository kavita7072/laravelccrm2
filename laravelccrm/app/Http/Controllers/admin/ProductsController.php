<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use App\Models\Category;


class ProductsController extends Controller
{
    public function index()
    {
        {
            $products = Products::latest()->paginate(10);
    
            return view('admin.product.list',compact('products'));
        }
    
    }


    public function create() 
    {
      $companies = Category::get();
        return view('admin.product.create',compact('companies'));
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
        'company' => 'required',
        'productservicename' => 'required',
        'price' => 'required',
          
         
        
        ]);
            
        if ($validator->passes()){

            $products = new Products();
            $products->company = $request->company;
            $products->productservicename = $request->productservicename;
            $products->price = $request->price;
            
           
            $products->save();
    
            
            return redirect()->route('products.index');
            return response()->json(
              [
                'status' => true,
                'message'=> 'product added successfully'
                
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

      $products =  Products::where('id',$id)->first();{

      return view ('admin.product.edit',['products' => $products]);

      }
    }

    public function update(Request $request, $id) 
       
        {
          $validator = Validator::make($request->all(),[
            'company' => 'required',
            'productservicename' => 'required',
            'price' =>'required',
            
          
          ]);
      
          $products = Products::where('id',$id)->first();
                
            $products->company = $request->company;
            $products->productservicename = $request->productservicename;
            $products->price = $request->price;
            $products->save();
    
            
    
        
          return redirect()->route('products.index');
        
        }
       

  
    

    public function destroy($id){

      $products  = Products::where('id',$id)->first();
      $products ->delete();
      return back()->withSuccess('deleted !!!!!!');
    }

   


 


        
    
      
}

    

