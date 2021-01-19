@extends('admin.layout.master2')
@section('title', 'Edit User')
@section('content')


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Edit User</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/edit-user'.'/'.$user->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">First Name:</label>
											<div class="col-lg-9">
												<input type="text"  name="first_name" value="{{$user->first_name}}" class="form-control" >
											    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('first_name') }}</strong>
			                                    </span>
											</div>
										</div>


										<div class="form-group">
											<label class="col-lg-3 control-label">Last Name:</label>
											<div class="col-lg-9">
												<input type="text"  name="last_name" value="{{$user->last_name}}" class="form-control" >
											    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('last_name') }}</strong>
			                                    </span>
											</div>
										</div>

										
                                       		@csrf
										<div class="form-group">
											<label class="col-lg-3 control-label">Email:</label>
											<div class="col-lg-9">
												<input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Your strong password" readonly>
												<strong>{{ $errors->first('emaail') }}</strong>
											</div>
										</div>
                                          
                                         
                                      


										<div class="form-group">
											<label class="col-lg-3 control-label">Image:</label>
											<div class="col-lg-9">
												<input type="file" name="image" class="file-styled" id="imgthumb" accept="image/*">
												<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												
												
											

												<img src="{{ URL::to('/') }}/public/images/{{$user->image}}" id="img-preview" class="img-thumbnail" width="75" />
												
 
  												
												 
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
								<input type="date"  name="date_to" class="form-control" value="{{$user->date_to}}" >
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('date_to') }}</strong>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Date From:</label>
							<div class="col-lg-9">
								<input type="date"  name="date_from" class="form-control"  value="{{$user->date_from}}" >
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

@endsection