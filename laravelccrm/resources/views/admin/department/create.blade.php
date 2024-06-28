@extends('admin.layouts.app')

@section('content')

	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Department</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('department.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('department.store') }}" method="POST" id="departmentForm" name="departmentForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
                                        
											<label for="Company_Name">Company_Name</label>
                                            <select name= "Company_Name" id="Company_Name" class="form-control" style = "background-color:white">
                                            <option value="">Select Company</option>
                                            @foreach ( $companies as $category)
                                                 
                                                <option value="{{ $category->CompanyName }}">{{ $category->CompanyName}}</option>
                                                @endforeach
                                           </select>
											<!-- <select name= "Company_Name" id="Company_Name" class="form-control">
                                                <option value="Company_Name">Company_Name</option>
                                                <option value="xyz">xyz</option>
                                                <option value="xyzzz">xyzzz</option>
                                                <option value="webcube">webcube</option>
                                           </select>	 -->
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Department_Name">Department_Name</label>
											<input type="text" name="Department_Name" id="Department_Name" class="form-control" placeholder="department_Name">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Department_Description">Department_Description</label>
											<input type="text" name="Department_Description" id="Department_Description" class="form-control" placeholder="department_description">	
                                            <p></p>	
										</div>
									</div>
                                    
                                   
                                   	
                                           
									
									
									
									</div>									
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('department.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('department.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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

         
        $("#departmentForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("department.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('department.index') }}";

                        $("#Company_Name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#Department_Name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#Department_Description").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                       
                       
                        $("#Action").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                       


                    }  else {

                        var errors = response['errors'];
                        
                        if(errors['Company_Name']){
                        $("#Company_Name").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Company_Name']);

                       }else

                       {
                        $("#Company_Name").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Department_Name']){
                        $("#Department_Name").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Department_Name']);

                       }else

                       {
                        $("#Department_Name").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Department_Description']){
                        $("#Department_Description").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Department_Description']);

                       }else

                       {
                        $("#Department_Description").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Action']){
                        $("#Action").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Action']);
                        } else

                       {
                        $("#Action").removeClass('is-invalid')
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

                  
                      

                    

                

                      