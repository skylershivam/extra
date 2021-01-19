@extends('admin.layout.master2')
@section('title', 'Admin')
@section('content')


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Edit Admin</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/admin-edit'.'/'.$admins->id)}}" class="form-horizontal" enctype="multipart/form-data" method="Post" id="english_registration_form">
                            
                                <div class="panel panel-flat">
                        			<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label"> Name:</label>
											<div class="col-lg-9">
												<input type="text" id="name" name="name" value="{{$admins->name }}" class="form-control" ><span class="error"><p id="name_error"></p></span>
												<br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
											</div>
										</div>


										

										
                                       		@csrf
										<div class="form-group">
											<label class="col-lg-3 control-label">Email:</label>
											<div class="col-lg-9">
												<input type="text" name="email" class="form-control" value="{{$admins->email }}" >
												<br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
											
											</div>
										</div>
                                        
										
									   
                                        
                                       
                                       
       
      
                                        <div class="form-group">
											<label class="col-lg-3 control-label">Image:</label>
											<div class="col-lg-9">
												<input type="file" name="image" class="file-styled" id="imgthumb" accept="image/*">
												<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												<!-- <img id="blah" src="{{url('public/'.$admins->image)}}" alt="your image" class="img-thumbnail" width="75" /> -->
												
												
											

												<img src="{{ URL::to('/') }}/public/images/{{ $admins->image}}" id="img-preview" class="img-thumbnail" width="75" />
												
 
  												
												 
			                                    </span>
											</div>
										</div>
										
										
										<div class="form-group ">
						<label class="col-lg-3 control-label">User Managment:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="users_managment">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('users_managment') }}</strong>
			                                    </span>   
							</div>
                    </div>

					<div class="form-group ">
						<label class="col-lg-3 control-label">Category:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="category">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('category') }}</strong>
			                                    </span>   
							</div>
                    </div>
					<div class="form-group ">
						<label class="col-lg-3 control-label">Listing Types:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="listing_types">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('listing_types') }}</strong>
			                                    </span>   
							</div>
                    </div>
					<div class="form-group ">
						<label class="col-lg-3 control-label">Product Listing:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="product_listing">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('product_listing') }}</strong>
			                                    </span>   
							</div>
                    </div>
					<div class="form-group ">
						<label class="col-lg-3 control-label">Blogs:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="blogs">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('blogs') }}</strong>
			                                    </span>   
							</div>
                    </div>
					<div class="form-group ">
						<label class="col-lg-3 control-label">Badges:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="badges">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('badges') }}</strong>
			                                    </span>   
							</div>
                    </div>
					<div class="form-group ">
						<label class="col-lg-3 control-label">Subscription Plan:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="subscription_plans">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('subscription_plans') }}</strong>
			                                    </span>   
							</div>
                    </div>

					<div class="form-group ">
						<label class="col-lg-3 control-label">Subscriptions:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="subscriptions">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('subscriptions') }}</strong>
			                                    </span>   
							</div>
                    </div>

					<div class="form-group ">
						<label class="col-lg-3 control-label">App Content:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="app_content">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                                  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('app_content') }}</strong>
			                                    </span>   
							</div>
                    </div>

                                      
					<div class="form-group ">
						<label class="col-lg-3 control-label">Role:</label>


                            <div class="col-md-6">
							
                                
 
                                <select class="form-control" class="form-control" name="adminrole">
                                    <option value="" class="form-control">Please Select Role</option>        
                                    @foreach($roles as $role)
                                    <option >{{$role->name}} </option>
                                    @endforeach
                                  </select>
								  <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('adminrole') }}</strong>
			                                    </span>
							</div>
                    </div>


										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
			
			<script>
				setTimeout(function() {
					$('.alert').fadeOut('fast');
				}, 5000); 
				function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function(e) {
					$('#img-preview').attr('src', e.target.result);
					}
					
					reader.readAsDataURL(input.files[0]); // convert to base64 string
				}
				}

				$("#imgthumb").change(function() {
					readURL(this);  
					});
             </script>


<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
	<script>




@endsection