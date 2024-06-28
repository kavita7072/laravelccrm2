<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice;



class InvoiceController extends Controller
{
    public function index()
    {
        {
            $invoice = Invoice::latest()->paginate(10);
    
    
            return view('admin.invoices.list',compact('invoice'));
        }
    
    }


    public function create() 
    {
        return view('admin.invoices.create');
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
        'taskid' => 'required',
        'text' => 'nullable',
        'email' => 'required',
        'phone' => 'required',
          
         
        
        ]);
            
        if ($validator->passes()){

            $invoice = new Invoice();
            $invoice->taskid = $request->taskid;
            $invoice->text = $request->text;
            $invoice->email = $request->email;
            $invoice->phone = $request->phone;
            
           
            $invoice->save();
    
            
            return redirect()->route('invoice.index');
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

    public function edit($id){

        $invoice =  Invoice::where('id',$id)->first();{

      return view ('admin.invoices.edit',['invoice' => $invoice]);

      }
    }

    public function update(Request $request, $id) 
       {
        
        $validator = Validator::make($request->all(),[
          'taskid' => 'required',
          'text' => 'nullable',
          'email' => 'required',
          'phone' => 'required',
            
            
          
          ]);
      
          $invoice =  Invoice::where('id',$id)->first();
                
          $invoice->taskid = $request->taskid;
          $invoice->text = $request->text;
          $invoice->email = $request->email;
          $invoice->phone = $request->phone;
          
         
          $invoice->save();
        
          return redirect()->route('invoice.index');
        
        
       }

  
    

    public function destroy($id){

        $invoice  = Invoice::where('id',$id)->first();
        $invoice ->delete();
      return back()->withSuccess('deleted !!!!!!');
    }


    public function generatePdf(){


      $invoice = Invoice::get();
      $data = [
          'title' => 'Funda of Web IT',
          'date' => date('m/d/y'),
          'invoice' => $invoice
      ];
      $pdf = Pdf::loadView('admin.invoices.generate-product-pdf', $data);
      return $pdf->download('invoice.pdf');
      return back()->withSuccess('download !!!!!!');
     
  }
   


 


        

  
}


