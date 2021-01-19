@extends('admin.layout.master2')
@section('title', 'Return&Refunds')
@section('content')

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Return&Refunds</li>
			</ul>
   		</div>

	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<button type="button" onclick="window.location.href='{{url('admin/add-return-refund-content')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Return Refund</button>
		<!-- Basic datatable -->
		<div class="panel panel-flat">

				<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Tutle</th>
						<th>Descriptions</th>
						<th class="text-center">Actions</th> 
					</tr>
				</thead>
				<tbody>

				@php($i=1)
				@foreach($return_refunds as $return_refund)
					<tr>
						<td>{{$i++}}</td>
						<td><?php echo strlen($return_refund->title) > 20 ? substr($return_refund->title,0,20)."..." : $return_refund->title; ?></td>
						<td><?php echo strlen($return_refund->description) > 20 ? substr($return_refund->description,0,20)."..." : $return_refund->description; ?></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-rig	ht">
										<li><a href="{{url('admin/edit-return-refund'.'/'.$return_refund->id)}}"><i class="icon-pencil5"></i> Edit</a></li> 
										<li><a href="{{url('admin/delete-return-refund'.'/'.$return_refund->id)}}"><i class="icon-cross"></i> Delete</a></li> 
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