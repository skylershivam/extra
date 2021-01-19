@extends('admin.layout.master2')
@section('title', 'Category')
@section('content')

<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Category</li>
			</ul>
   		</div>

	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<button type="button" onclick="window.location.href='{{url('admin/add-sell-category')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Category</button>
		<!-- Basic datatable -->
		<div class="panel panel-flat">

				<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Name</th>
						<th>Image</th>
						<th>Status</th>
						<th class="text-center">Actions</th> 
					</tr>
				</thead>
				<tbody>

				@php($i=1)
				@foreach($categories as $categorie)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$categorie->name}}</td>
						<td><img src="@if($categorie->image) {{url('public/'.$categorie->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" alt="" height="35px" witdh="35px" class="img-circle img-md"></td>
						<td><a href="{{url('admin/active-inactive-category'.'/'.$categorie->id)}}">@if($categorie->is_active==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{url('admin/edit-category'.'/'.$categorie->id)}}"><i class="icon-pencil5"></i> Edit Category</a></li> 
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