@extends('admin.layout.master2')
@section('title', 'Free')
@section('content')
<?php //echo $users;die(); ?>
<style type="text/css">
	/*body {

    font-family: "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 1.5384616;
    color: #333333;
    width: 1325px;  

}*/
</style>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Free</li>
			</ul>
   		</div>
	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
    <button type="button" onclick="window.location.href='{{url('admin/add-free')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Product</button>

        <!-- Basic datatable -->
		<div class="panel panel-flat">
				<table class="table datatable-basic" style="table-layout:fixed;">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Product Name</th>
						<th>Category</th>
						
						<th>Sale Price</th>
						<th>Actual Price</th>
						<th>Discount Price</th>
						<th>Quantity</th>
						<th>Description</th>  
						<th>Image</th>
						<th>status</th>
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($products as $product)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$product->product_name}}</td>
						<td>{{$product->category}}</td>
						<td>{{$product->sale_price}}</td>
						<td>{{$product->actual_price}}</td>
						<td>{{$product->discount_price}}</td>
						<td>{{$product->quantity}}</td>
						<td>{{$product->description}}</td>
						
						<td><img src="{{ URL::to('/') }}/public/images/{{$product->image}}" class="img-thumbnail" width="75" /></td>

						
						<td><a href="{{url('admin/active-inactive-product/'.$product->id)}}">@if($product->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-product')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-free'.'/'.$product->id)}}"><i class="icon-eye"></i>View</a></li>
										<li><a href="{{url('admin/delete-free'.'/'.$product->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-free'.'/'.$product->id)}}"><i class="icon-pencil5"></i>Edit</a></li>

									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
													
				</tbody>
			</table>
		</div>
		<!-- /basic datatable -->
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