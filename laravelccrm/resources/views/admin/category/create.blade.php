@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Company</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('categories.store') }}" method="POST" id="categoryForm" name="categoryForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="CompanyName">Company Name</label>
											<input type="text" name="CompanyName" id="CompanyName" class="form-control" placeholder="Company Name">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Address">Address</label>
											<input type="text" name="Address" id="Address" class="form-control" placeholder="Address">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Website">Website</label>
											<input type="text" name="Website<" id="Website<" class="form-control" placeholder="Website">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Email">Email</label>
											<input type="text" name="Email" id="Email" class="form-control" placeholder="Email">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="GSTIN">GSTIN</label>
											<input type="text" name="GSTIN" id="GSTIN" class="form-control" placeholder="GSTIN">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Contact">Contact</label>
											<input type="integer" name="Contact" id="Contact" class="form-control" placeholder="Contact">	
                                            <p></p>	
										</div>
									</div>
                                   			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('categories.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        
        $("#categoryForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("categories.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('categories.index') }}";

                        $("#CompanyName").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#Address").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#Website").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#Email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#GSTIN").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                       
                        $("#Contact").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                       
                       


                    }  else {

                        var errors = response['errors'];
                        
                        if(errors['CompanyName']){
                        $("#CompanyName").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['CompanyName']);

                       }else

                       {
                        $("#CompanyName").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Address']){
                        $("#Address").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Address']);

                       }else

                       {
                        $("#Address").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Website']){
                        $("#Website").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Website']);

                       }else

                       {
                        $("#Website").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Email']){
                        $("#Email").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Email']);

                       }else

                       {
                        $("#Email").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['GSTIN']){
                        $("#GSTIN").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['GSTIN']);

                       }else

                       {
                        $("#GSTIN").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }
                       if(errors['Contact']){
                        $("#Contact").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Contact']);

                       }else

                       {
                        $("#Contact").removeClass('is-invalid')
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
 
                    
         

        
        
     
       

                       

                     

              

   
   