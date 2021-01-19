@extends('admin.layout.master2')
@section('title', 'Badge Requests')
@section('content')
<style type="text/css">
	body {

   /* font-family: "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 1.5384616;
    color: #333333;
    width: 1325px;  */

}
</style>
<?php //echo $reports;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Badge Requests</li>
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
					    <th>Business Name</th>
					  	<th>Email</th> 
						<th>Registration Type</th>
						
						<th>Status</th>
						<?php if(((Auth::guard('admin')->user()->badges)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

						<th class="text-center">Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($badge_requests as $badge_request)
				<?php //echo $report->reportBy->name; die();  ?>
					<tr>
						<td>{{$i++}}</td>
						<td>{{$badge_request->user->full_name}}</td>
						<td>{{$badge_request->business_name}}</td>
						<td>{{$badge_request->email}}</td>
						<td>@if($badge_request->regist_type==1) {{'Private Limited Company'}} @endif</td>
						<td>{{-- <a href="{{url('admin/request-status/'.$badge_request->id)}}"> --}}@if($badge_request->request_status==1) <span class="label label-default"> Pending @elseif($badge_request->request_status==2) <span class="label label-success"> Aprroved @else <span class="label label-danger"> Declined @endif</span>{{-- </a> --}}</td>
						<?php if((Auth::guard('admin')->user()->badges)=='Read&Write'||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
							

						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/view-request/'.$badge_request->id)}}"><i class="icon-eye"></i> View</a></li>
										<li><a href="{{url('admin/request-approve/'.$badge_request->id)}}"><i class="icon-checkmark3"></i>Request Approve</a></li>
										<li><a href="{{url('admin/request-decline/'.$badge_request->id)}}"><i class="icon-cross2"></i>Request Decline</a></li>
										
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