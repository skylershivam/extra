@extends('admin.layout.master2')
@section('title', 'View Business')
@section('content')
<?php //dd($business); ?>

<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View Business</li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
		<!-- Horizontal form options -->
		<div class="panel panel-flat form-horizontal">
    			<div class="panel-body">
    				<div class="form-group">
						<label class="col-lg-3 control-label">Name:</label>
						<div class="col-lg-9">
							<input type="text"  name="name" value="{{$business->full_name}}" class="form-control" readonly>
						    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
						</div>
					</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Image:</label>
					<div class="col-lg-9">
						<img src="@if($business->image) {{url('public/'.$business->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
					</div>
				</div>
                   		@csrf
                   	<div class="form-group">
						<label class="col-lg-3 control-label">Email:</label>
						<div class="col-lg-9">
							<input type="text" name="email" value="{{$business->email}}" class="form-control" readonly>
						</div>
					</div>
	

					<div class="form-group">
						<label class="col-lg-3 control-label">Phone Number:</label>
						<div class="col-lg-3">
							<input type="text" name="phone_number" value="{{$business->phone_number}}" class="form-control"  readonly>
						</div>
					</div>
           		
					<div class="form-group">
						<label class="col-lg-3 control-label">Address:</label>
						<div class="col-lg-3">
						<input type="text"  name="country"  class="form-control daterange-single"  value="{{$business->address}}" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Business Name:</label>
						<div class="col-lg-3">
						<input type="text"  name="country"  class="form-control daterange-single"  value="{{$business->business_name}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Website Link:</label>
						<div class="col-lg-3">
						<input type="text"  name="country"  class="form-control daterange-single"  value="{{$business->website_link}}" readonly>
						</div>
					</div>
				</div>
		</div>  
		<!-- Footer -->
		@include('admin.layout.footer') 
		<!-- /footer -->
	</div>
	<!-- /content area -->

			</div>
			<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
@endsection