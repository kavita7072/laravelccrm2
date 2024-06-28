<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\LeadController;
use App\Http\Controllers\admin\LeadManageController;
use App\Http\Controllers\admin\ClientManageController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\quoteController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\ReceviedController;

use App\Http\Controllers\admin\PdfController;

use App\Http\Controllers\RazorpayPaymentController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//rajorpay

Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

   
    



Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest'],function(){

        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::get('/register',[AdminLoginController::class,'/register_view'])->name('admin.register');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
        
      
       
    });
    

        Route::group(['middleware'=> 'admin.auth'],function(){

       Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
      Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

       //categories

       Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
       Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
       Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
    
       
       Route::get('categories/{id}/edit',[CategoryController::class,'edit']);
       Route::put('categories/{id}/update',[CategoryController::class,'update']);

       Route::delete('/categories/{id}/delete',[CategoryController::class,'destroy']);
    
       //department

       Route::get('/department',[DepartmentController::class,'index'])->name('department.index');
       Route::get('/department/create',[DepartmentController::class,'create'])->name('department.create');
       Route::post('/department',[DepartmentController::class,'store'])->name('department.store');

       Route::get('department/{id}/edit',[DepartmentController::class,'edit']);
       Route::put('department/{id}/update',[DepartmentController::class,'update']);

       Route::delete('/department/{id}/delete',[DepartmentController::class,'destroy']);
      

       //employee

       Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
       Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
       Route::post('/employee',[EmployeeController::class,'store'])->name('employee.store');

       Route::get('employee/{id}/edit',[EmployeeController::class,'edit']);
       Route::put('employee/{id}/update',[EmployeeController::class,'update']);

       Route::delete('/employee/{id}/delete',[EmployeeController::class,'destroy']);
      
    
      // lead

      Route::get('/leads',[LeadController::class,'index'])->name('leads.index');
      Route::get('/leads/create',[LeadController::class,'create'])->name('leads.create');
      Route::post('/leads',[LeadController::class,'store'])->name('leads.store');

      Route::get('leads/{id}/edit',[LeadController::class,'edit']);
      Route::put('leads/{id}/update',[LeadController::class,'update']);


      Route::delete('/leads/{id}/delete',[LeadController::class,'destroy']);

    


    });

    // leadmanage

      Route::get('leadmanages',[LeadManageController::class,'index'])->name('leadmanages.index');
      Route::get('/leadmanages/create',[LeadManageController::class,'create'])->name('leadmanages.create');
      Route::post('/leadmanages',[LeadManageController::class,'store'])->name('leadmanages.store');

      Route::get('leadmanages/{id}/edit',[LeadManageController::class,'edit']);
      Route::put('leadmanages/{id}/update',[LeadManageController::class,'update']);

      Route::delete('/leadmanages/{id}/delete',[LeadManageController::class,'destroy']);
     

       // clientmanage

       Route::get('clientmanages',[ClientManageController::class,'index'])->name('clientmanages.index');
       Route::get('/clientmanages/create',[ClientManageController::class,'create'])->name('clientmanages.create');
       Route::post('/clientmanages',[ClientManageController::class,'store'])->name('clientmanages.store');

       Route::get('clientmanages/{id}/edit',[ClientManageController::class,'edit']);
       Route::put('clientmanages/{id}/update',[ClientManageController::class,'update']);

       Route::delete('/clientmanages/{id}/delete',[ClientManageController::class,'destroy']);


        // product

      Route::get('/products',[ProductsController::class,'index'])->name('products.index');
      Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
      Route::post('/products',[ProductsController::class,'store'])->name('products.store');

      Route::get('products/{id}/edit',[ProductsController::class,'edit']);
      Route::put('products/{id}/update',[ProductsController::class,'update']);

      Route::delete('/products/{id}/delete',[ProductsController::class,'destroy']);
      
   // recevie

   Route::get('/recevied',[ReceviedController::class,'index'])->name('recevied.index');
   Route::get('/recevied/create',[ReceviedController::class,'create'])->name('recevied.create');
   Route::post('/recevied',[ReceviedController::class,'store'])->name('recevied.store');

   Route::get('recevied/{id}/edit',[ReceviedController::class,'edit']);

   Route::put('recevied/{id}/update',[ReceviedController::class,'update']);

   Route::delete('/recevied/{id}/delete',[ReceviedController::class,'destroy']);

    // invoice

    Route::get('/invoice',[InvoiceController::class,'index'])->name('invoice.index');
    Route::get('/invoice/create',[InvoiceController::class,'create'])->name('invoice.create');
    Route::post('/invoice',[InvoiceController::class,'store'])->name('invoice.store');
 
    Route::get('invoice/{id}/edit',[InvoiceController::class,'edit']);
    Route::put('invoice/{id}/update',[InvoiceController::class,'update']);
 
    Route::delete('/invoice/{id}/delete',[InvoiceController::class,'destroy']);


       
      // pdf 
      Route::get('/invoice/generate-pdf',[InvoiceController::class,'generatePdf']);

      
// quote
Route::get('/quote',[quoteController::class,'index'])->name('quote.index');
    Route::get('/quote/create',[quoteController::class,'create'])->name('quote.create');
    Route::post('/quote',[quoteController::class,'store'])->name('quote.store');

    Route::delete('/quote/{id}/delete',[quoteController::class,'destroy']);

   
    
     
});   


     
        

       

 
       

