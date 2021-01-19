@extends('admin.layout.master')
@section('title', 'login')
@section('content')
<style type="text/css">
	.navbar-brand > img {
    margin-top: -6px;
    height: 40px;
}
 .panel {
    margin-bottom: 20px;
    background-color: #ccccccd4;
    border: 1px solid transparent;
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
body.login-container.pace-done {
    background: url({{url(env('BACKGROUND_IMAGE'))}});
    background-size: cover;
    background-repeat: no-repeat;
}
.text-center {
    text-align: center;
    float: left;
    width: 100%;
    color: #fff;
}
.form-group {
    margin-bottom: 20px;
    position: relative;
    float: left;
    width: 100%;
}
p.am_log {
    float: left;
    width: 100%;
    text-align: center;
}
.am_log img {
    width: 170px !important;
    padding: 20px;
}
.text-center a {
    color: #fff;
}
.panel {
    background-color: rgba(0,0,0,0.8);
}
<?php //dd($errors->first('email')); ?>
</style>
	<!-- Main navbar -->
	
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Simple login form -->
					<form action="{{url('admin/login')}}" method="post">

						<div class="panel panel-body login-form">
							<p class="am_log brand-image img-circle elevation-3"><a class="" href="{{url('admin/dashboard')}}"><img src="{{url(env('PROJECT_LOGO'))}}"   alt=""></a>
							</p>
							<div class="text-center">
								<!-- <div class=""><img src="{{url('public/images/logo.png')}}" height="50px" width="50px"><img></div> -->
								
								
								 @if (Session::has('message'))
							<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
							@endif
							</div>
							{{csrf_field()}}

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" name='email' class="form-control" placeholder="Email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>

								@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:#f8f5f5;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
                             
							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name='password' class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								@if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="color:#f8f5f5;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="{{url('admin/forgot-password')}}">Forgot password?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->
					<!-- Footer -->
					@include('admin.layout.footer') 
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->

@endsection

