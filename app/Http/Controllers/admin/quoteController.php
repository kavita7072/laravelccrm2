<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\quote;
use App\Models\LeadManage;



class quoteController extends Controller
{
    public function index()
    {
        {
            $quote = quote::latest()->paginate(10);
            
    
    
            return view('admin.quote.list',compact('quote'));
        }
}
public function create() 
{
    $leadmanage = LeadManage::get();
    return view('admin.quote.create',compact('leadmanage'));

    
}

public function store(Request $request) {
    
    $validator = Validator::make($request->all(),[
    'lead' => 'required',
   
      
     
    
    ]);
        
    if ($validator->passes()){

        $quote = new quote();
        $quote->lead = $request->lead;
       
        
       
        $quote->save();

        
        return redirect()->route('quote.index');
        return response()->json(
          [
            'status' => true,
            'message'=> 'invoice added successfully'
            
  ]
    );

   
   }else{
    return response()->json([
          'status' => false,
          'errors'=> $validator->errors()
    ]);
   } 
   
}  
public function destroy($id){

    $quote  =  quote::where('id',$id)->first();
    $quote ->delete();
  return back()->withSuccess('deleted !!!!!!');
}   
}