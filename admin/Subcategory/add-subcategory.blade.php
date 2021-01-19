@extends('admin.layout.master2')
@section('title', 'Add Sub Category')
@section('content')
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Add Sub Category</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/add-subcategory')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
									
									<div class="form-group">
											<label class="col-lg-3 control-label">Main Category:</label>
											<div class="col-lg-9">
											<select class="form-control" class="form-control" name="maincategory_id">
											    <option value="" class="form-control">Please Select Main Category</option>        
												@foreach($maincategories as $maincategory)
												<option value="{{$maincategory->id}}">{{$maincategory->maincategoryname}} </option>
												@endforeach
											</select>
											    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('maincategory_id') }}</strong>
			                                    </span>
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-lg-3 control-label">Sub Category:</label>
											<div class="col-lg-9">
												<input type="text"  name="name"  class="form-control" >
											    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
											</div>
										</div>

										
									
                                       		@csrf
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->
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


