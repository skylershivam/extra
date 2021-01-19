@extends('admin.layout.master2')
@section('title', 'Add Blog')
@section('content')
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Add Blog</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/add-blog')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
									
									  <div class="form-group">
											<label class="col-lg-3 control-label"> Title:</label>
											<div class="col-lg-9">
												<input type="text"  name="title" class="form-control" >
											    <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('title') }}</strong>
			                                    </span>
											</div>
									  </div>
										
										
										
										<div class="form-group">
											<label class="col-lg-3 control-label">Blog:</label>
											<div class="col-lg-9">
												
											   <textarea id="textarea" rows="30" cols="150" name="blog"></textarea>
											   
											    <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('blog') }}</strong>
			                                    </span>
			                                    
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-lg-3 control-label">Image:</label>
											<div class="col-lg-9">
												<input type="file" name="image" class="file-styled" accept="image/*">
												<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												<br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('image') }}</strong>
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
	
	<script>
                
        CKEDITOR.replace( 'textarea' );
    </script>
	
	
	
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


