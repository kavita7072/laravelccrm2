@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Invoice</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('invoice.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('invoice.store') }}" method="POST" id="invoiceForm" name="invoiceForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="taskid">Task Id</label>
											<input type="text" name="taskid" id="taskid" class="form-control" placeholder="taskid">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="text">Text</label>
											<input type="text" name="text " id="text " class="form-control" placeholder="text ">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" class="form-control" placeholder="price">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="phone">Phone</label>
											<input type="text" name="phone" id="price" class="form-control" placeholder="price">	
                                            <p></p>	
										</div>
									</div>
                                   
                                  
												
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('invoice.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('invoice.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        
        $("#invoiceForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("invoice.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('invoice.index') }}";

                        $("#taskid").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#text").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#phone").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                       
                       


                    }  else {

                        var errors = response['errors'];
                        
                        if(errors['taskid']){
                        $("#taskid").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['taskid']);

                       }else

                       {
                        $("#taskid").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['text']){
                        $("#text").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['text']);

                       }else

                       {
                        $("#text").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['email']){
                        $("#email").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['email']);

                       }else

                       {
                        $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['phone']){
                        $("#phone").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['phone']);

                       }else

                       {
                        $("#phone").removeClass('is-invalid')
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