@extends('admin.layout.master2')
@section('title', 'login')
@section('content')

<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Edit Profile</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/update-profile')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
									   	@csrf
										<div class="form-group">
											<label class="col-lg-3 control-label">Image:</label>
											<div class="col-lg-9">
												<input type="file" name="image" class="file-styled" id="imgInp" required>
												<span class="help-block invalid-feedback msg" role="alert" style="color:red"><strong>{{ $errors->first('image') }}</strong></span>
												</br>
												<img id="blah" src="{{url('public/'.$admin->image)}}" alt="your image" height="100px" width="100px" class="img-circle" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Email:</label>
											<div class="col-lg-9">
												<input type="email"  name="email" value="{{$admin->email}}" class="form-control" >
											    <span class="invalid-feedback" role="alert"  style="color: red">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
											</div>    
										</div>
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
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
	</script>			
@endsection