@extends('admin.layouts.app')

@section('content')

   <!-- Content Header (Page header) -->
   <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Employee List</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('employee.create') }}" class="btn btn-primary">New Employee</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        @include('admin.message')
						<div class="card">
							<div class="card-header">
								<div class="card-tools">
									<div class="input-group input-group" style="width:250px;">
										<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>
                                        
											<th>Company Name</th>
                                            <th>Department</th>
                                            <th>address</th>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Guardian Name</th>
                                            <th>Guardian No</th>
											<th>Action</th>

                                        
                                        
										</tr>
									</thead>
									<tbody>
                                        @if ($employee->isNotEmpty())
                                            @foreach ( $employee as $employees )

                                            <tr>
											<td>{{ $employees->id }}</td>
											<td>{{ $employees->company}}</td>
											<td>{{ $employees->department }}</td>
                                            <td>{{ $employees->address }}</td>
                                            <td>{{ $employees->Name }}</td>
                                            <td>{{ $employees->contactno }}</td>
                                            <td>{{ $employees->guardian }}</td>
                                            <td>{{ $employees->guardianno }}</td>
                                            
                                                 
                                            <td>
                                            
                                           
                                          
											<a href="employee/{{  $employees->id  }}/edit" class="btn btn-dark btn-sm">Edit</a> 

											
                                           <form method="POST" class="d-inline" action="employee/{{  $employees->id  }}/delete">
	                                          @csrf
	                                        @method('DELETE')
	                                             <button type="submit" class="btn btn-danger btn-sm">Delete</button>

</form>
												
                                                </td>
                                            </td>
                                            
										
										</tr>
										<tr>
                                        @endforeach    
                                        @else  
                                             <tr> 
                                                <td colspan="9">Records Not found</td>
                                             </tr>  

                                        @endif

                                    	</tbody>
								</table>										
							</div>  
										
										
											
												
											
											
										
								
							<!-- <div class="card-footer clearfix">
								<ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>

                                
                                                  
							</div>  -->
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
				
				<!-- /.content -->	<!-- Content Header (Page header) -->
			
				<!-- /.content -->	<!-- Content Header (Page header) -->
				
				<!-- /.content -->

     

    @endsection

    @section('customJs')
   

    @endsection
