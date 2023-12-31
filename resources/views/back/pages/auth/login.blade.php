@extends('back.layouts.auth-layout')
@section('title')
Login Page
@endsection

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
                <li><a href="{{route('registerPage')}}">Register</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
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
                <img src="/back/vendors/images/login-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Login</h2>
                    </div>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input-group custom">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-lg" placeholder="E-mail">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control form-control-lg" placeholder="**********">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row pb-30">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="forgot-password"><a href="{{route('forgetPassword')}}">Forgot Password</a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                        {{-- use code for form submit --}}
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                    </form>
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{route('registerPage')}}">Register To Create Account</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection