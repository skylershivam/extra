@extends('admin.layout.master2')
@section('title', 'View Request')
@section('content')

<?php  //echo $request;die(); ?>
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Request Detail</li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
		<!-- Horizontal form options -->
		<div class="panel panel-flat form-horizontal">
			<div class="col-lg-12">
				<div class="col-lg-6">
					<h1>Business Detail</h1>
	    			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Application Type:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="@if($request->application_type ==1) Company @endif" class="form-control" readonly>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Business Name:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$request->business_name}}" class="form-control" readonly>
						
					</div>
				</div>
				
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->email}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Phone Number:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->phone_number}}" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Address:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->address}}" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Registration Type:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="@if($request->regist_type==1) {{'Private Limited Company'}} @endif" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Registration Number:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->regist_number}}" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Registration Date:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->regist_date}}" class="form-control" readonly>
					</div>
				</div>
				
				
			</div>
				</div>
				
				<div class="col-lg-6">
					<h1>Owner Detail</h1>
					
	    			<div class="panel-body">
	    				<div class="form-group">
					<label class="col-lg-3 control-label">Name:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$request->full_name}}" class="form-control" readonly>
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					</div>
				</div>
			
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Identification Type:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="@if($request->regist_type==1) {{'Driving Licence'}} @endif" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Identification Number:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->id_number}}" class="form-control" readonly>
					</div>
				</div>
		

				<div class="form-group">
					<label class="col-lg-3 control-label">Date Issued:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->date_issue}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Date Expiry:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$request->date_expiry}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Document:</label>
					<div class="col-lg-9">
						<img src="@if($request->image) {{url('public/'.$request->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
					</div>
				</div>
					
					</div>
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
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
@endsection