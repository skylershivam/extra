@extends('admin.layout.master2')
@section('title', 'Main Category')
@section('content')

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Main Category</li>
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

	<button type="button" onclick="window.location.href='{{url('admin/add-category')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Main Category</button>
	<?php } ?>
		<!-- Basic datatable -->
		<div class="panel panel-flat">

				<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Main Category</th>
						<th>Image</th>
						<th>Status</th>
						<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
						<th class="text-center">Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>

				@php($i=1)
				@foreach($categories as $categorie)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$categorie->name}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $categorie->image}}" class="img-thumbnail" width="75" /></td>

						<td><a href="{{url('admin/active-inactive-category'.'/'.$categorie->id)}}">@if($categorie->is_active==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

						<td class="text-center">
						
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/edit-category'.'/'.$categorie->id)}}"><i class="icon-pencil5"></i> Edit</a></li>
										<li><a href="{{url('admin/delete-category'.'/'.$categorie->id)}}"><i class="icon-folder-remove"></i> Delete</a></li>

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