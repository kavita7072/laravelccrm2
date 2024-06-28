@extends('admin.layouts.app')

@section('content')

   <!-- Content Header (Page header) -->
   <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Company List</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('categories.create') }}" class="btn btn-primary">New Company</a>
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
                                            <th>Address</th>
                                            <th></th>
                                            <th>Email</th>
                                            <th>GSTIN </th>
                                            <th>Contact</th>
											<th  spacing-right:400>Action</th>
                                        
                                        
										</tr>
									</thead>
									<tbody>
                                        @if ($categories->isNotEmpty())
                                            @foreach ( $categories as $category )

                                            <tr>
											<td>{{ $category->id }}</td>
											<td>{{ $category->CompanyName}}</td>
											<td>{{ $category->Address }}</td>
                                            <td>{{ $category->Website }}</td>
                                            <td>{{ $category->Email }}</td>
                                            <td>{{ $category->GSTIN }}</td>
                                            <td>{{ $category->Contact }}</td>
                                            <td>{{ $category->Action }} </td>
                                                 
											<td>
											<a href="categories/{{  $category->id }}/edit" class="btn btn-dark btn-sm">Edit</a> 

											
                                          <form method="POST" class="d-inline" action="categories/{{ $category->id }}/delete">
	                                      @csrf
	                                      @method('DELETE')
								
								
                                              <button type="submit" class="btn btn-danger btn-sm">Delete</button></form>
											
											
											
											
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
