@extends('admin.layout.master2')
@section('title', 'Subscription History')
@section('content')
<?php //echo $subscriptions->subscriptionPlan; die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Subscription History</li>
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
						<th>Subscription Plan</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Charges</th>
						<th>Plan Status</th>
						<th>Transaction id</th>
						
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($subscriptions as $subscription)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$subscription->subscriptionPlan->plan_name}}</td>
						<td>{{date('Y-m-d',strtotime($subscription->created_at))}}</td>
						<td>{{date("Y-m-d", strtotime("+1 month",strtotime($subscription->created_at)))}}</td>
						<td>${{$subscription->amount}}</td>
						<td>@if(strtotime("+1 month",strtotime($subscription->created_at)) >= strtotime(date('Y-m-d'))) <span class="label label-success"> Active @else <span class="label label-default"> Expired @endif</span></a></td>
						<td>{{$subscription->transaction_id}}</td>
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