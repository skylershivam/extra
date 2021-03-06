@extends('admin.layout.master2')
@section('title', 'Users')
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
				
				<li class="active">Users</li>
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
						<th>Full Name</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Image</th>

						
						<th>status</th>
						<th class="text-center">Actions</th> 
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($users as $user)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$user->full_name}}</td>
						<td>{{$user->user_name}}</td>
						<td>{{$user->email}}</td>
						<td><img src="@if($user->image) {{url('public/'.$user->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" alt="" height="35px" witdh="35px" class="img-circle img-md"></td>
						
						<td><a href="{{url('admin/active-inactive'.'/'.$user->id)}}">@if($user->status==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<!-- <li><a href="{{url('admin/edit-user'.'/'.$user->id)}}"><i class="icon-pencil5"></i> Edit User</a></li> -->
										<li><a href="{{url('admin/view-user'.'/'.$user->id)}}"><i class="icon-eye"></i> View</a></li>
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