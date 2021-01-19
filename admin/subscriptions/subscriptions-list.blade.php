@extends('admin.layout.master2')
@section('title', 'Business')
@section('content')
<?php  //echo json_encode($subscriptions);die(); ?>

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Business</li>
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
						<th>Email</th>
						<th>Subscription Plan</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Plan Status</th>
						<?php if((Auth::guard('admin')->user()->subscriptions)=='Read&Write'){ ?>

						<th class="text-center">Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($subscriptions as $subscription)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$subscription->business->full_name}}</td>
						<td>{{$subscription->business->email}}</td>
						<td>{{$subscription->subscriptionPlan->plan_name}}</td>
						<td>{{date('Y-m-d',strtotime($subscription->created_at))}}</td>
						<td>{{date("Y-m-d", strtotime("+1 month",strtotime($subscription->created_at)))}}</td>
						<td>@if(strtotime("+1 month",strtotime($subscription->created_at)) >= strtotime(date('Y-m-d'))) <span class="label label-success"> Active @else <span class="label label-default"> Expired @endif</span></a></td>
						<?php if((Auth::guard('admin')->user()->subscriptions)=='Read&Write'){ ?>

						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<!-- <li><a href="{{url('admin/edit-business'.'/'.$subscription->business->id)}}"><i class="icon-pencil5"></i> Edit busines</a></li> -->
										<li><a href="{{url('admin/view-subscription-history'.'/'.$subscription->business->id)}}"><i class="icon-eye"></i> View History</a></li>
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