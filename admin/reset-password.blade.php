@extends('admin.layout.master')
@section('title', 'Reset-password')
@section('content')
<?php //echo $token; die;?>
<style type="text/css">
	.navbar-brand > img {
    margin-top: -6px;
    height: 40px;
}
 
</style>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{url('admin/dashboard')}}"><img src="{{url(env('PROJECT_LOGO'))}}"  height="50px" width="50px" alt=""> </a><div style="margin-top:18px">{{env('PROJECT_NAME')}}</div>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Password recovery -->
					<form action="{{url()->current()}}" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Reset Password</h5>
								 @if (Session::has('message'))
									<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
								@endif
							</div>
                            @csrf
							<div class="form-group has-feedback">
								<input type="password" required name="new_password" class="form-control" placeholder="Enter new password">
								<input type="hidden"  name="reset_password_link" value="{{$token}}">
								<span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('new_password') }}</strong>
			                                    </span>
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
                           </div>
                           <div class="form-group has-feedback">
								<input type="password" required name="confirm_password" class="form-control" placeholder="Enter confirm password">
								<span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('confirm_password') }}</strong>
			                                    </span>
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
                           </div>

							<button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
					<!-- /password recovery -->


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

