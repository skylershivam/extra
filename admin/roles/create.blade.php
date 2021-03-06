@extends('admin.layout.master2')
@section('title', 'add role')
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
							<form action="{{url('admin/store-role')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
                            @csrf
                                <div class="panel panel-flat">
                        			<div class="panel-body">
                                    <div class="form-group">
											<label class="col-lg-3 control-label">Admin Role:</label>
											<div class="col-lg-9">
												<input type="text"  name="name" class="form-control" >
											    <br><span class="invalid-feedback" role="alert" style="color:red">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span> 
											</div>
										</div>


					<!-- <div class="form-group ">
						<label class="col-lg-3 control-label">Permission:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="permission">
                                    <option value="" class="form-control">Please Select Permission</option>        
                                    @foreach($permissions as $permission)
                                    <option >{{$permission->name}} </option>
                                    @endforeach
                                  </select>
                            </div>
                    </div> -->
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
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
			<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
	<script>
@endsection