
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('admin assets/css/style.css') }} ">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			@include('admin.message')
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">CRM</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>REVOPS</h2>
								<p>Don't have an account?</p>
								<a href="#" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="{{ route('admin.authenticate') }}" method="post" class="signin-form">
								@csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">email</label>
			      			
							  <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
			      		</div>
						  @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
		              
		            </div>
					@error('password')
					<p class="invalid-feedback">{{ $message }}</p>
					@enderror
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
						
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src= "{{asset('admin assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('admin assets/js/popper.js') }} "></script>
  <script src= "{{asset('admin assets/js/bootstrap.min.js') }}"></script>
  <script src=" {{asset('admin assets/js/main.js') }}"></script>

  
 
	</body>
</html>

