@extends('admin.layout.master2')
@section('title', 'Edit Sub Category')
@section('content')
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Edit Sub Category1</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/edit-sub-category/'.$category->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
										
										<div class="form-group">
												<label class="col-lg-3 control-label">Select Category:</label>
										<div class="col-lg-9">
	                        				<select class="form-control"  name="category_id">
	                        					
	                        					@foreach($categories as $categorie)
	                        				  	
	                        				  	<option @if($category->category_id == $categorie->id) selected  @endif value="{{$categorie->id}}" >{{$categorie->name}} </option>
									          
									          	@endforeach
									        </select>   
									         <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('category_id') }}</strong>
			                                    </span>
								     	</div> 
								     	</div> 
								     	<div class="form-group">
											<label class="col-lg-3 control-label">Name:</label>
											<div class="col-lg-9">
												<input type="text" value="{{$category->name}}" name="name"  class="form-control" >
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
	<script type="text/javascript">
		function readURL(input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#blah').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}

$("#imgInp").change(function() {
  readURL(this);
});
	</script>	
@endsection


