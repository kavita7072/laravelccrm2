@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Client Lead</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('clientmanages.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('clientmanages.store') }}" method="POST" id="clientmanageForm" name="clientmanageForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="Name">Name</label>
											<input type="text" name="Name" id="Address" class="form-control" placeholder="Name">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Emailid">Email Id</label>
											<input type="text" name="Emailid" id="Emailid" class="form-control" placeholder="Emailid">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="ContactNo">Contact No.</label>
											<input type="text" name="ContactNo" id="Address" class="form-control" placeholder="ContactNo">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="ComapanyDetails">Comapany Details</label>
											<input type="text" name="ComapanyDetails" id="ComapanyDetails" class="form-control" placeholder="ComapanyDetails">	
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
											<label for="GSTNo">GST.No.</label>
											<input type="text" name="GSTNo" id="GSTNo" class="form-control" placeholder="GSTNo">	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Product">Product</label>
                                            <select name= "Product" id="Product" class="form-control" style = "background-color:white">
                                            <option value="">Select product</option>
                                            @foreach ( $data as  $products)
                                                 
                                                <option value="{{   $products->productservicename }}">{{   $products->productservicename }}</option>
                                                @endforeach
                                           </select>
											<!-- <select name="Product" id="Product" class="form-control">
                                                <option vlaue=" ">Product</option>
                                                <option vlaue="ttgghh">ttgghh</option>
                                                <option vlaue="xxyyzz">xxyyzz</option>
                                                </select>		 -->
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="EmployeeName">Employee Name</label>
                                            <select name= "EmployeeName" id="EmployeeName" class="form-control">
                                            <option value="">Select Employee</option>
                                            @foreach ( $emp as  $employee )
                                                 
                                                <option value="{{  $employee->Name }}">{{  $employee->Name }}</option>
                                                @endforeach
										<!-- 	<select name="EmployeeName" id="EmployeeName" class="form-control">
                                                <option vlaue=" ">Employee Name</option>
                                                <option vlaue="Normal ">Normal</option>
                                                <option vlaue="Hot">Hot</option>
                                                <option vlaue="semi hot">semi hot</option> -->
                                           </select>	
                                           
                                            <p></p>	
										</div>
									</div>
                                   
                                  
												
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('clientmanages.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('clientmanages.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        
        $("#clientmanageForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("clientmanages.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('clientmanages.index') }}";

                        $("#Name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#Emailid").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#ContactNo").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#ComapanyDetails").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#Address").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#GSTNo").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#Product").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#EmployeeName").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                       
                       


                    }  else {

                        var errors = response['errors'];
                        
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

                       if(errors['Emailid']){
                        $("#Emailid").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Emailid']);

                       }else

                       {
                        $("#Emailid").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['ContactNo']){
                        $("#ContactNo").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['ContactNo']);

                       }else

                       {
                        $("#ContactNo").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['ComapanyDetails']){
                        $("#ComapanyDetails").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['ComapanyDetails']);

                       }else

                       {
                        $("#ComapanyDetails").removeClass('is-invalid')
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

                       if(errors['GSTNo']){
                        $("#GSTNo").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['GSTNo']);

                       }else

                       {
                        $("#GSTNo").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['Product']){
                        $("#Product").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Product']);

                       }else

                       {
                        $("#Product").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['EmployeeName']){
                        $("#EmployeeName").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['EmployeeName']);

                       }else

                       {
                        $("#EmployeeName").removeClass('is-invalid')
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
                      

                       
