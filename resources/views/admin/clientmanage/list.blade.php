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
								<a href="{{ route('clientmanages.create') }}" class="btn btn-primary">New Lead</a>
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
                                           
											<th>Name</th>
                                            <th>Email Id</th>
                                            <th>Contact No</th>
                                            <th>Comapany Details</th>
                                            <th>Address</th>
                                            <th>GST No</th>
                                            <th>Product</th>
                                            <th>Employee  Name</th>
											<th width="100">Action</th>
                                           
                                        
										</tr>
									</thead>
									<tbody>
                                        @if ( $clientmanages->isNotEmpty())
                                            @foreach ( $clientmanages as $clientmanage )

                                            <tr>
											<td>{{ $clientmanage->id }}</td>
											<td>{{ $clientmanage->Name }}</td>
                                            <td>{{ $clientmanage->Emailid }}</td>
                                            <td>{{ $clientmanage->ContactNo }}</td>
                                            <td>{{ $clientmanage->ComapanyDetails }}</td>
                                            <td>{{ $clientmanage->Address }}</td>
                                            <td>{{ $clientmanage->GSTNo }}</td>
                                            <td>{{ $clientmanage->Product }}</td>
                                            <td>{{ $clientmanage->EmployeeName }}</td>
                                            
                                            
                                            <td>
                                            
											<a href="clientmanages/{{ $clientmanage->id}}/edit" class="btn btn-dark btn-sm">Edit</a> 

											
                                          <form method="POST" class="d-inline" action="clientmanages/{{  $clientmanage->id }}/delete">
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
