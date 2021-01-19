@extends('admin.layout.master2')
@section('title', 'Sub Category')
@section('content')

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Sub Category</li>
			</ul>
   		</div>

	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

	<button type="button" onclick="window.location.href='{{url('admin/add-subcategory')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Sub Category</button>
	<?php } ?>
		<!-- Basic datatable -->
		<div class="panel panel-flat">

				<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Main Category</th>
						<th>Sub Category</th>
						
						<th>Status</th>
						<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
						<th class="text-center">Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>

				@php($i=1)
				@foreach($subcategories as $subcategorie)
					<tr>
						<td>{{$i++}}</td>
					 
						<td>{{$subcategorie->maincategoryname}}</td>
					 
						<td>{{$subcategorie->name}}</td>
						
						<td><a href="{{url('admin/active-inactive-subcategory'.'/'.$subcategorie->id)}}">@if($subcategorie->is_active==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

						<td class="text-center">
						
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/edit-subcategory'.'/'.$subcategorie->id)}}"><i class="icon-pencil5"></i> Edit</a></li>
										<li><a href="{{url('admin/delete-subcategory'.'/'.$subcategorie->id)}}"><i class="icon-folder-remove"></i> Delete</a></li>

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