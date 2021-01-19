@extends('admin.layout.master2')
@section('title', 'Permission')
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
				
				<li class="active">Add Permission</li>
			</ul>
   		</div>
	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
    
	<?php if((Auth::guard('admin')->user()->permission)=='Write'){ ?>
	<button type="button" onclick="window.location.href='{{url('admin/add-permission')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Permission</button>
    <?php } ?>
        <!-- Basic datatable -->
		<div class="panel panel-flat">
				<table class="table datatable-basic" style="table-layout:fixed;">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>status</th>
						<?php if((Auth::guard('admin')->user()->permission)=='Write'){ ?>
						<th>Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($permissions as $permission)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$permission->name}}</td>
						
						
						
						
						
						
						<td>
						<?php if((Auth::guard('admin')->user()->permission)=='Write'){ ?>
							
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
									    <li><a href="{{url('admin/edit-permission'.'/'.$permission->id)}}"><i class="icon-pencil5"></i> Edit Permission</a></li>
										<li><a href="{{url('admin/delete-permission'.'/'.$permission->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>

								</ul>
								</li>
							</ul>
						</td>
						<?php } ?>
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