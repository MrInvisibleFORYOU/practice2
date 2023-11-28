@extends('back.layouts.auth-layout')
@section('title')
Register
@endsection

@push('stylesheets')
<link rel="stylesheet" type="text/css" href="/back/src/plugins/jquery-steps/jquery.steps.css">
@endpush

@section('content')
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="/back/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href={{route('loginPage')}}>Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
			@if ($errors->any())
  				<div class="alert alert-danger">
       				<ul>
          				 @foreach ($errors->all() as $error)
              				 <li>{{ $error }}</li>
           				@endforeach
      				</ul>
   				</div>
			@endif
					<img src="/back/vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form action="{{route('register')}}" class="tab-wizard2 wizard-circle wizard" method="POST">
								@csrf	
								<h5>Register</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email Address*</label>
											<div class="col-sm-8">
												<input type="email" name="email" value="{{old('email')}}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username*</label>
											<div class="col-sm-8">
												<input type="text" name="name" value="{{old('name')}}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input type="password" name="password" value="{{old('password')}}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Confirm Password*</label>
											<div class="col-sm-8">
												<input name="password_confirmation" type="password" class="form-control">
											</div>
										</div>
									</div>
								</section>
							<button type="submit" class="btn btn-info">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
    <script src="back/src/plugins/jquery-steps/jquery.steps.js"></script>
	{{-- <script src="/back/vendors/scripts/steps-setting.js"></script> --}}
@endsection
	