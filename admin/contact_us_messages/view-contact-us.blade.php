@extends('admin.layout.master2')
@section('title', 'View user')
@section('content')

<?php// echo $user->scores_count;die(); ?>
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View User</li>
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
							<input type="text"  name="name" value="{{$user->name}}" class="form-control" readonly>
						    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Image:</label>
						<div class="col-lg-9">
							<img src="@if($user->image) {{url('public/'.$user->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
							
						</div>
					</div> 
                   		@csrf
                   	<div class="form-group">
						<label class="col-lg-3 control-label">Email:</label>
						<div class="col-lg-9">
							<input type="text" name="email" value="{{$user->email}}" class="form-control" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Gender:</label>
						<div class="col-lg-3	">
							<input type="text" name="gender" value="@if($user->gender == 'm') {{'Male'}} @elseif($user->gender == 'f') {{'Female'}} @else {{'Not Available'}}  @endif" class="form-control"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Marital Status:</label>
						<div class="col-lg-3">
						<input type="text"  name="dob"  class="form-control daterange-single"  value="@if($user->martial_status == '0') {{'Single'}} @elseif($user->martial_status == '1') {{'Married'}} @else {{'Not Available'}} @endif" readonly>
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-lg-3 control-label">Age:</label>
						<div class="col-lg-3">
							<input type="text" name="age" value="{{$user->age}}" class="form-control"  readonly>
						</div>
					</div> -->

					<div class="form-group">
						<label class="col-lg-3 control-label">Scores:</label>
						<div class="col-lg-3">
							<input type="text" name="scores_count" value="{{$user->scores_count}}" class="form-control"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">D.O.B:</label>
						<div class="col-lg-3">
						<input type="text"  name="dob"  class="form-control daterange-single"  value="{{date('m-d-Y', strtotime($user->dob))}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Country:</label>
						<div class="col-lg-3">
						<input type="text"  name="country"  class="form-control daterange-single"  value="{{$user->country}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Sate:</label>
						<div class="col-lg-3">
							<input type="text" name="phone_number" value="{{$user->state}}" class="form-control"  readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">City:</label>
						<div class="col-lg-3">
							<input type="text" name="phone_number" value="{{$user->city}}" class="form-control"  readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Zip code:</label>
						<div class="col-lg-3">
							<input type="text" name="phone_number" value="{{$user->zip_code}}" class="form-control"  readonly>
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