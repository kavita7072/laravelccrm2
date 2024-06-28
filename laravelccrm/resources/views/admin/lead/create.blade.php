@extends('admin.layouts.app')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Lead</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('leads.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{ route('leads.store') }}" method="POST" id="leadForm" name="leadForm">
                        @csrf  
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="CompanyName">Company Name</label>
                                            <select name= "CompanyName" id="CompanyName" class="form-control">
                                            <option value="">Select Company</option>
                                            @foreach ( $companies as $category)
                                                 
                                                <option value="{{ $category->CompanyName }}">{{ $category->CompanyName}}</option>
                                                @endforeach
                                           </select>
                                           <!--  <select name="CompanyName" id="CompanyName" class="form-control">
                                                <option vlaue=" ">CompanyName</option>
                                                <option vlaue="fffff">fffff</option>
                                                <option vlaue="xxyyzz">xxyyzz</option>
                                                </select>	 -->
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="Department">Department</label>
                                            <select name= "Department" id="Department" class="form-control">
                                            <option value="">Select department</option>
                                            
                                            @foreach ( $departments  as $department)
                                                 
                                                <option value="{{ $department->Department_Name  }}">{{ $department->Department_Name }}</option>
                                                @endforeach
                                                 
                                           </select>
											<!-- <select name="Department" id="Department" class="form-control">
                                                <option vlaue=" ">Department</option>
                                                <option vlaue="ttgghh">ttgghh</option>
                                                <option vlaue="xxyyzz">xxyyzz</option>
                                                </select>	 -->	
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="LeadType">Lead Type</label>
											<select name="LeadType" id="LeadType" class="form-control">
                                                <option vlaue=" ">LeadType</option>
                                                <option vlaue="Normal ">Normal</option>
                                                <option vlaue="Hot">Hot</option>
                                                <option vlaue="semi hot">semi hot</option>
                                           </select>	
                                           
                                            <p></p>	
										</div>
									</div>
                                   
                                  
												
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="{{ route('leads.store') }}" class="btn btn-primary">Create</button>
							<a href="{{ route('leads.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        
        $("#leadForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

           
            $.ajax({
                url: '{{ route("leads.store") }}',
                type: 'post',
                date: element.serializeArray(),
                dataType: 'json',
                success: function(response){

                    if(response["status"] == true){ 

                       
                        window.location.href = "{{ route('leads.index') }}";

                        $("#CompanyName").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                        
                    
                        $("#Department").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $("#LeadType").removeClass('is-invalid')
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

                       if(errors['Department']){
                        $("#Department").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['Department']);

                       }else

                       {
                        $("#Department").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html("");

                       }

                       if(errors['LeadType']){
                        $("#LeadType").addclass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['LeadType']);

                       }else

                       {
                        $("#LeadType").removeClass('is-invalid')
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