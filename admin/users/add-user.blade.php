@extends('admin.layout.master2')
@section('title', 'User')
@section('content')


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Add User</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/store')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">First Name:</label>
											<div class="col-lg-9">
												<input type="text"  name="first_name" class="form-control" >
											    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('first_name') }}</strong>
			                                    </span>
											</div>
										</div>


										<div class="form-group">
											<label class="col-lg-3 control-label">Last Name:</label>
											<div class="col-lg-9">
												<input type="text"  name="last_name"  class="form-control" >
											    <span class="invalid-feedback" role="alert" color="red">
			                                        <strong>{{ $errors->first('last_name') }}</strong>
			                                    </span>
											</div>
										</div>

										
                                       		@csrf
										<div class="form-group">
											<label class="col-lg-3 control-label">Email:</label>
											<div class="col-lg-9">
												<input type="text" name="email" class="form-control" placeholder="Enter Your Email" >
											    <span class="invalid-feedback" role="alert" color="red">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
											</div>
										</div>
                                        

                                        
                                        <div class="form-group row">
                                        <label class="col-lg-3 control-label">Password:</label>

                                            <div class="col-lg-9">
                                            <input id="password" type="password" class="form-control" name="password">

                               
                                            </div>
                                      </div>
                                        
									  <div class="form-group">
											<label for="profile" class="col-lg-3 control-label">Upload Image</label>

											<div class="col-lg-9">
												<input  type="file" class="form-control" name="image" accept="image/*" >
												<span class="invalid-feedback" role="alert" style="color: red">
														<strong>{{ $errors->first('image') }}</strong>
													</span>
											</div>
                						</div> 
										
										
					 <div class="form-group">
					    <label class="col-lg-3 control-label">Plan:</label>
					     <div class="col-md-6">
							<select name="plan_id" class="form-control input-chng2">
							<option value="">Please Select Plan</option> @foreach ($plans as $key => $value)
							<option value="{{ $value->id}}">{{ $value->plan_name}}</option> @endforeach </select>
					     </div>
					  </div>

					  <div class="form-group">
					   <label class="col-lg-3 control-label">Price:</label>
					    <div class="col-md-6">
						 
							<select name="subcategory" id="selectsubscribtion" class="form-control input-chng2"> </select>
							</div>	
						</div> 				
										

											


						<div class="form-group">
							<label class="col-lg-3 control-label">Date to:</label>
							<div class="col-lg-9">
								<input type="date"  name="date_to" class="form-control" >
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('date_to') }}</strong>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Date From:</label>
							<div class="col-lg-9">
								<input type="date"  name="date_from" class="form-control" >
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('date_from') }}</strong>
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
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('select[name="plan_id"]').on('change', function() {
		var stateID = $(this).val();
		if(stateID) {
			$.ajax({
				url: "{{url('admin/myform/user')}}/" + stateID,
				type: "GET",
				dataType: "json",
				success: function(data) {
					var list = JSON.stringify(data);
					//console.log(list);
					var nano = JSON.parse(list);
					//console.log(nano);
					$('select[name="subcategory"]').empty();
					for(var i = 0; i < nano.length; i++) {

						$('#selectsubscribtion').append('<option value="' + nano[i]['price'] + '">' + nano[i]['price'] + '</option>');
					}
				}
			});
		} else {
			$('select[name="subcategory"]').empty();
		}
	});
});
</script>

<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
	
	
	
	<!-- /theme JS files -->
	
@endsection