@extends('admin.layout.master2')
@section('title', 'Seller')
@section('content')

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Seller</li>
			</ul>
   		</div>

	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	
		<!-- Basic datatable -->
		<div class="panel panel-flat">

				<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
					     <th>Order Name</th>
                        <th>Order Id</th>
                        <th>Seller Name</th>
                        <th>Customer Name</th>
                        
                        <th>Amount</th>
                        <th>Date Of Order</th>
                        <th>Status</th>
						<th class="text-center">Actions</th> 
					</tr>
				</thead>
				<tbody>

				@php($i=1)
				@foreach($orders as $order)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$order->oder_name}}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->seller_name}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->order_date}}</td>
                        <td><a href="{{url('admin/active-inactive-category'.'/'.$order->id)}}">@if($order->is_active==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/edit-sellerorder'.'/'.$order->id)}}"><i class="icon-pencil5"></i> Edit Status</a></li>

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