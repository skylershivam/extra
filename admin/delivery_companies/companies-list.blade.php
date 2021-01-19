@extends('admin.layout.master2')
@section('title', 'Delivery Companies')
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
				
				<li class="active">Delivery Companies</li>
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
						<th>Name</th>
						<th>Image</th>
						<th>Company Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Status</th>
						<th class="text-center">Actions</th> 
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($companies as $company)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$company->name}}</td>
						<td>{{$company->image}}</td>
						<td>{{$company->company_name}}</td>
						<td>{{$company->email}}</td>
						<td>{{$company->address}}</td>
						<td><a href="{{url('admin/active-inactive-company'.'/'.$company->id)}}">@if($company->is_active==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/view-company'.'/'.$company->id)}}"><i class="icon-eye"></i> View</a></li>
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