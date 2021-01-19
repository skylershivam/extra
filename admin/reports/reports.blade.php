@extends('admin.layout.master2')
@section('title', 'User-Report')
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
				
				<li class="active">Reports</li>
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
					    <th>Reported By</th>
					    <th>Reported Against</th>
					  	<th>Comment</th> 
						<th>Created on</th>
						<th class="text-center">Actions</th> 
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($reports as $report)
				<?php //echo $report->reportBy->name; die();  ?>
					<tr>
						<td>{{$i++}}</td>
						<td>{{$report->reportBy->full_name}}</td>
						<td>{{$report->reportTo->full_name}}</td>
						 <td><?php echo strlen($report->comments) > 20 ? substr($report->comments,0,20)."..." : $report->comments; ?></td> 
						<td>{{$report->created_at}}</td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/view-report'.'/'.$report->id)}}"><i class="icon-eye"></i> View</a></li>
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