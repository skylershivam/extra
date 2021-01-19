@extends('admin.layout.master2')
@section('title', 'Listing Type')
@section('content')

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Listing Type</li>
			</ul>
   		</div>

	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<?php if(((Auth::guard('admin')->user()->listing_types)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){?>

	<button type="button" onclick="window.location.href='{{url('admin/add-listingtype')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Listing Type</button>
	<?php } ?>
		<!-- Basic datatable -->
		<div class="panel panel-flat">

				<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Listing Name</th>
						<th>Image</th>
						<th>Listing Status</th>
						<?php if(((Auth::guard('admin')->user()->listing_types)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){
							?>	<th class="text-center">Actions</th> 
						<?php } ?> 
					</tr>
				</thead>
				<tbody>

				@php($i=1)
				@foreach($lists as $list)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$list->name}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $list->image}}" class="img-thumbnail" width="75" /></td>

						<td><a href="{{url('admin/active-inactive-listing'.'/'.$list->id)}}">@if($list->is_active==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>

						<?php if(((Auth::guard('admin')->user()->listing_types)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/edit-listingtype'.'/'.$list->id)}}"><i class="icon-pencil5"></i> Edit Listing</a></li>
										<li><a href="{{url('admin/delete-listingtype'.'/'.$list->id)}}"><i class="icon-folder-remove"></i> Delete Listing</a></li>

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