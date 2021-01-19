@extends('admin.layout.master2')
@section('title', 'View Product')
@section('content')
<?php// echo $user->scores_count;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View Product</li>
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
					<label class="col-lg-3 control-label">Product Name:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$product->product_name}}" class="form-control" readonly>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Category:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$product->subCategory->category->name}}" class="form-control" readonly>
						
					</div>
				</div>
				
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Sub Category:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$product->subCategory->name}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Price:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$product->price}}" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Discount:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$product->discount}}" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-3 control-label">Images:</label>
						<div class="col-lg-9">
							@foreach($product->images as $image)
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