@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Employee Details</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('employee.store') }}" method="POST" id="employeeForm" name="employeeForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="company">Company Name</label>
                                            <select name= "Company_Name" id="Company_Name" class="form-control" style = "background-color:white">
                                            <option value="">Select Company</option>
                                            @foreach ( $companies as $category)
                                                 
                                                <option value="{{ $category->CompanyName }}">{{ $category->CompanyName}}</option>
                                                @endforeach
                                           </select>
										<!-- 	<select name= "company" id="company" class="form-control">
                                                <option value=" ">company</option>
                                                <option value="xyz">xyz</option>
                                                <option value="xyzzz">xyzzz</option>
                                           </select>	 -->
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="department">Department</label>
                                            <select name= "department" id="department" class="form-control">
                                            <option value="">Select department</option>
                                            
                                            @foreach ( $departments  as $department)
                                                 
                                                <option value="{{ $department->Department_Name  }}">{{ $department->Department_Name }}</option>
                                                @endforeach
                                                 
                                           </select>

											<!-- <select name= "department" id="department" class="form-control">
                                                <option value=" ">department</option>
                                                <option value="xxyyzz">xyz</option>
                                                <option value="xyzzz">xyzzz</option>
                                           </select>		 -->
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="address">Address</label>
											<input type="text" name="address" id="address" class="form-control" placeholder="address">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Name">Name</label>
											<input type="text" name="Name" id="Name" class="form-control" placeholder="Name">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="contactno">Contact No</label>
											<input type="text" name="contactno" id="GSTIN" class="form-control" placeholder="contactno">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="guardian">Guardian</label>
											<input type="text" name="guardian" id="guardian" class="form-control" placeholder="guardian">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="guardianno">Guardian No</label>
											<input type="text" name="guardianno" id="guardianno" class="form-control" placeholder="guardianno">	
                                            <p></p>	
										</div>
									</div>
                                  
																
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('employee.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('employee.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->	<!-- Content Header (Page header) -->
			
				<!-- /.content -->	<!-- Content Header (Page header) -->
				
				<!-- /.content -->

     

    @endsection
    @section('customJs')

    <script>
        
        $("#employeeForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("employee.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                        

                       
                        window.location.href = "{{ route('employee.index') }}";

                        $("#company").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#department").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#address").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#Name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#contactno").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                       
                        $("#guardian").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                       
                        $("#guardianno").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                       


                    }  else {

                        var errors = response['errors'];
                        
                        if(errors['company']){
                        $("#company").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['company']);

                       }else

                       {
                        $("#company").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['department']){
                        $("#department").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['department']);

                       }else

                       {
                        $("#department").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['address']){
                        $("#address").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['address']);

                       }else

                       {
                        $("#address").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Name']){
                        $("#Name").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Name']);

                       }else

                       {
                        $("#Name").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['contactno']){
                        $("Contactno").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['contactno']);

                       }else

                       {
                        $("#contactno").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }
                       if(errors['guardian']){
                        $("#guardian").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['guardian']);

                       }else

                       {
                        $("#guardian").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                

                        if(errors['guardianno']){
                        $("#guardianno").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['guardianno']);
                        } else

                       {
                        $("#guardianno").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");
                       }

                    }, error:function(jqXHR, exception){
                    console.log("Something Went wroung");
                }

              
            }});   
                
            });          
                    
        
            </script>


@endsection
 
                    
         

        
        
     
       

                       

                     

              

   
   