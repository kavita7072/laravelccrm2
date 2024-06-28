@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create quote</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('quote.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('quote.store') }}" method="POST" id="quoteForm" name="quoteForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="lead">lead</label>
                                            <select name= "lead" id="lead" class="form-control">
                                            <option value="">Select Lead</option>
                                            
                                            @foreach (  $leadmanage  as  $leadmanage)
                                                 
                                                <option value="{{ $leadmanage->Name}}">{{ $leadmanage->Name }}</option>
                                              
                                                @endforeach
                                                 
                                           </select>
										
                                            <p></p>	
										</div>
									</div>
                                   
                                   
                                   
                                   
                                  
												
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('quote.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('quote.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
                url: '{{ route("quote.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('quote.index') }}";

                        $("#lead").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                       

                       
                       


                    }  else {

                        var errors = response['errors'];
                        
                        if(errors['lead']){
                        $("#lead").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['lead']);

                       }else

                       {
                        $("#lead").removeClass('is-invalid')
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
