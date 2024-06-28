@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Recevied Invioce</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('recevied.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('recevied.store') }}" method="POST" id="receviedForm" name="receviedForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
									
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="invoiceno">Invioce Number</label>
											<input type="text" name="invoiceno" id="invoiceno" class="form-control" placeholder="invoiceno">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Amount">Recevied Amount</label>
											<input type="text" name="Amount" id="Amount" class="form-control" placeholder="Amount">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="image">Image</label>
											<input type="file" name="image" id="image" class="form-control" placeholder="image">	
                                            <p></p>	
										</div>
									</div>
                                   
                                  
												
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('recevied.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('recevied.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        
        $("#receviedForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("recevied.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('recevied.index') }}";

                        $("#invoiceno").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#Amount").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                     


                    }  else {

                        var errors = response['errors'];
                        
                        if(errors['invoiceno']){
                        $("#invoiceno").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['invoiceno']);

                       }else

                       {
                        $("#invoiceno").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Amount']){
                        $("#Amount").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Amount']);

                       }else

                       {
                        $("#Amount").removeClass('is-invalid')
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