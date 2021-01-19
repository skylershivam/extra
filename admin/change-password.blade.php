@extends('admin.layout.master2')
@section('title', 'Change Password')
@section('content')
<?php //dd($errors->first('error'));  ?>
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Change Password</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/change-password')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
                        				
										<div class="form-group">
											<label class="col-lg-3 control-label">Old Password:</label>
											<div class="col-lg-9">
												<input type="password"  name="old_password" value="{{ old('old_password')}}" class="form-control"  required>
											    <span class="invalid-feedback" role="alert" style="color: red">
			                                      @if (Session::has('old_pwd'))
											{{ Session::get('old_pwd') }}
											@endif
											</span>
											</div>    
										</div>


										<div class="form-group">
											<label class="col-lg-3 control-label">New Password:</label>
											<div class="col-lg-9">
												<input type="password"  name="password" value="{{ old('password')}}" class="form-control"  required>
											    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
											</div>    
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Confirm Password:</label>
											<div class="col-lg-9">
												<input type="password"  name="confirm_password" value="{{ old('confirm_password')}}" class="form-control" required>
											    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('confirm_password') }}</strong>
			                                    </span>
											</div>
										</div>
										
                                       		@csrf
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->
					<!-- Footer -->
					@include('admin.layout.footer') 
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
	<!-- /theme JS files -->

	<script type="text/javascript">
		function readURL(input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#blah').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}

$("#imgInp").change(function() {
  readURL(this);
});
	</script>>
@endsection