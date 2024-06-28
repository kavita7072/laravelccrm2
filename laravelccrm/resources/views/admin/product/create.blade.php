@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Product</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('products.store') }}" method="POST" id="productsForm" name="productsForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="company">Company</label>
                                            <select name= "company" id="company" class="form-control" >
                                            <option value="">Select Company</option>
                                            @foreach ( $companies as $category)
                                                 
                                                <option value="{{ $category->CompanyName }}">{{ $category->CompanyName}}</option>
                                                @endforeach
                                           </select>

                                          <!--   <select name="company" id="company" class="form-control">
                                                <option vlaue="company">company</option>
                                                <option vlaue="chain">chain</option>
                                                <option vlaue="trophy">trophy</option>
                                                </select>	 -->
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="productservicename">Product Service Name</label>
											<input type="text" name="productservicename" id="productservicename" class="form-control" placeholder="productservicename">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="price">price</label>
											<input type="text" name="price" id="price" class="form-control" placeholder="price">	
                                            <p></p>	
										</div>
									</div>
                                   
                                  
												
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('products.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        
        $("#productsForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("products.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('products.index') }}";

                        $("#company").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#productservicename").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#price").removeClass('is-invalid')
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

                       if(errors['productservicename']){
                        $("#productservicename").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['productservicename']);

                       }else

                       {
                        $("#productservicename").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['price']){
                        $("#price").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['price']);

                       }else

                       {
                        $("#price").removeClass('is-invalid')
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