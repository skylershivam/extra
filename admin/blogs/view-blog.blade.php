@extends('admin.layout.master2')
@section('title', 'View user')
@section('content')
<?php// echo $user->scores_count;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View User</li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
		<!-- Horizontal form options -->
		<div class="panel panel-flat form-horizontal">
			<div class="panel-body">
			<div class="form-group">
				<label class="col-lg-3 control-label">Blog:</label>
				<div class="col-lg-9">
					
				   <textarea id="w3mission" rows="10" cols="50" name="blog" class="form-control">{{$blog->blog}}</textarea>
				   	
				    
				    
				</div>
			</div>
				
				
				
				
			</div>
		</div>
		<!-- Footer -->
		@include('admin.layout.footer')
		<!-- /footer -->
	</div>
	<!-- /content area -->
</div>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
@endsection