@extends('admin.layout.master2')
@section('title', 'Delivery Company')
@section('content')
<?php// echo $user->scores_count;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View Company</li>
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
						<input type="text"  name="name" value="{{$company->name}}" class="form-control" readonly>
					  
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Image:</label>
					<div class="col-lg-9">
						<img src="@if($company->image) {{url('public/'.$company->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
					</div>
				</div>
				  <div class="form-group">
					<label class="col-lg-3 control-label">Company Name:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$company->name}}" class="form-control" readonly>
					  
					</div>
				</div>
				 <div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$company->email}}" class="form-control" readonly>
					  
					</div>
				</div>

				 <div class="form-group">
					<label class="col-lg-3 control-label">Address:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$company->address}}" class="form-control" readonly>
					  
					</div>
				</div>

				 <div class="form-group">
					<label class="col-lg-3 control-label">Description:</label>
					<div class="col-lg-9">
					 <textarea id="w3mission" rows="5" cols="50" name="blog" class="form-control" disabled="">
					 	{{$company->description}}
					 </textarea>
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