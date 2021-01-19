@extends('admin.layout.master2')
@section('title', 'View Post')
@section('content')
<?php  // echo $post;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View Post</li>
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
						<input type="text"  name="name" value="{{$post->name}}" class="form-control" readonly>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Category:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$post->subCategory->category->name}}" class="form-control" readonly>
						
					</div>
				</div>
				
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Sub Category:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->subCategory->name}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Price:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->price}}" class="form-control" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Make:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->make}}" class="form-control" readonly>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-lg-3 control-label">Model:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->model}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Year:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->year}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Mileage:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->mileage}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Location:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->location}}" class="form-control" readonly>
					</div>
				</div>


				<div class="form-group">
					<label class="col-lg-3 control-label">Transmission:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->transmission}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Selling Condition:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->selling_condition}}" class="form-control" readonly>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-lg-3 control-label">Color:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$post->vehicle->color}}" class="form-control" readonly>
					</div>
				</div>
                 <div class="form-group">
					<label class="col-lg-3 control-label">Description:</label>
					<div class="col-lg-9">
						<textarea class="form-control" rows="5"  readonly>{{$post->vehicle->description}}</textarea> 
					</div>
				</div>
 
				<div class="form-group">
						<label class="col-lg-3 control-label">Images:</label>
						<div class="col-lg-9">
							@foreach($post->images as $image)
							<img src="@if($image->name) {{url('public/'.$image->name)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
							@endforeach
							
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