@extends('admin.layout.master2')
@section('title', 'View-Pending')
@section('content')

<?php // echo $report;die(); ?>
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View Pending</li>
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
					<h1>Order Detail</h1>
	    			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Order By:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$delivery->order->product->user->full_name}}" class="form-control" readonly>
						
					</div>
				</div>
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Product Name:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$delivery->product->product_name}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Amount:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$delivery->delivery->amount}}" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Payment Type:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="@if($delivery->order->payment_type == 1) Online @else COD @endif" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Order Date:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{date('Y-m-d',strtotime($delivery->order->created_at))}}" class="form-control" readonly>
					</div>
				</div>
				
				
				
			</div>
				</div>
				
				<div class="col-lg-6">
					<h1>Delivery Company</h1>
					
	    			<div class="panel-body">
	    			<div class="form-group">
					<label class="col-lg-3 control-label">Company Name:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$delivery->deliveryCompany->company_name}}" class="form-control" readonly>
						
					</div>
					</div>

					<div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-9">
						<input type="text"  name="name" value="{{$delivery->deliveryCompany->email}}" class="form-control" readonly>
						
					</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Image:</label>
						<div class="col-lg-9">
							<img src="@if($delivery->deliveryCompany->image) {{url('public/'.$delivery->deliveryCompany->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
						</div>
					</div>
				@csrf

				<div class="form-group">
					<label class="col-lg-3 control-label">Address:</label>
					<div class="col-lg-9">
						<input type="text" name="email" value="{{$delivery->deliveryCompany->address}}" class="form-control" readonly>
					</div>
				</div>
					</div>
					</div>
					
				

					
				</div>
			</div>
				
			<!-- <div class="panel-body">
				<h1>Reason</h1>
					<div class="form-group">
						<label class="col-lg-3 control-label">Reason Descriptions:</label>
						<div class="col-lg-5">
							<textarea class="form-control"  disabled="" rows="5" cols="0">{{$report->message}}</textarea>
						  
						</div>
					</div>
			</div> -->

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