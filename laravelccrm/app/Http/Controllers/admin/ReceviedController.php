<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Recevied;
use Validate;

class ReceviedController extends Controller
{
    public function index()
    {
        {
            $recevied = Recevied::latest()->paginate(10);
    
            return view('admin.recevie.list',compact('recevied'));
        }
    
    }


    public function create() 
    {
        return view('admin.recevie.create');
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
        'invoiceno' => 'required',
        'Amount' => 'required',

          
         
        
        ]);
            
        if ($validator->passes()){

            $recevied = new Recevied();
            $recevied->invoiceno = $request->invoiceno;
            $recevied->Amount = $request->Amount;
            $recevied->save();
    
            
            return redirect()->route('recevied.index');
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

        $recevied =  Recevied::where('id',$id)->first();

      return view ('admin.recevie.edit',['recevied' => $recevied ]);

    }
    

    public function update(Request $request, $id) 
       {
      

        $validator = Validator::make($request->all(),[
        'invoiceno' => 'required',
        'Amount' => 'required',

      ]);
  
      $recevied =  Recevied::where('id',$id)->first();
            
        
      $recevied->invoiceno = $request->invoiceno;
      $recevied->Amount = $request->Amount;
      $recevied->save();


    
      return redirect()->route('recevied.index');
    
    
    }
       
        
        
    public function destroy($id){

      $recevied   = Recevied::where('id',$id)->first();
      $recevied  ->delete();
    return back()->withSuccess('deleted !!!!!!');
  }

 

}

       
           
      
        

       
     

       
          
         
    
       

      
    

   