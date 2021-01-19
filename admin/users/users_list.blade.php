@extends('admin.layout.master2')
@section('title', 'Users')
@section('content')
<?php //echo $users;die(); ?>
<style type="text/css">
	/*body {

    font-family: "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 1.5384616;
    color: #333333;
    width: 1325px;  

}*/

body{
background:linear-gradient(to right, #fff, #eee);
}
.parent{
  width:20x;
  
  background:red;
  margin:auto;
  border-radius:50%;
  margin-top:10px;
  position:relative;
  cursor:pointer;
}
@keyframes breathe{
  0%{transform:scale(1)}
  50%{transform:scale(0.5)}
  100%{transform:scale(1)}
}
@keyframes breathe2{
  0%{transform:scale(1)}
  50%{transform:scale(1.2)}
  100%{transform:scale(1)}
}
.parent:before{
  content:"";
  position:absolute;
  top:-5px;
  left:-5px;
  z-index:2;
  width:10px;
  height:10px;
  opacity:0.1;
  border-radius:50%;
  animation:breathe2 2s infinite;
}
.parent:after{
  content:"";
  position:absolute;
  top:-10px;
  left:-10px;
  z-index:3;
  width:50px;
  height:50px;
  background:#2033db;
  opacity:0.1;
  border-radius:100%;
  animation:breathe 2s infinite;
}
.parent > span{
  color:#fff;
  font-weight:bold;
  font-size:5px;
  position:absolute;
  z-index:2;
  top:3px;
  left:4px;
}




</style>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">Users</li>
				
			</ul>
   		</div>


		   
	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<?php if(((Auth::guard('admin')->user()->users_managment)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

      <button type="button" onclick="window.location.href='{{url('admin/adduser')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add User</button>
	 <?php } ?>
		<!-- Basic datatable -->
		<div class="panel panel-flat">
		  <div class="table-responsive">
			<table class="table datatable-basic">
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Image</th>
						<th>Plan</th>
						<th>Price</th>
						<th>Status</th>
						<th>Date To</th>
						<th>Date From</th>

						<?php if(((Auth::guard('admin')->user()->users_managment)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){
							?>	<th class="text-center">Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($users as $user)
					
					<tr>
						<td>{{$i++}}</td>
						<td>{{$user->first_name}}</td>
						<td>{{$user->last_name}}</td>
						<td>{{$user->email}}</td>

						<!-- <td><img src="@if($user->image) {{url('public/'.$user->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" alt="" height="35px" witdh="35px" class="img-circle img-md"></td> -->
						<td><img src="{{ URL::to('/') }}/public/images/{{ $user->image}}" class="img-thumbnail" width="75" /></td>
                        <td>{{$user->plan_name}}</td>
						<td>{{$user->subcategory}}</td>

						<td><a href="{{url('admin/active-inactive'.'/'.$user->id)}}">@if($user->status==1) <span class="label label-success"> Verified @else <span class="label label-default"> Not Verified @endif</span></a></td>
						<td>{{$user->date_to}}</td>
						<td>{{$user->date_from}}</td>
						<?php if(((Auth::guard('admin')->user()->users_managment)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

							<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
									    <li><a href="{{url('admin/edit-user'.'/'.$user->id)}}"><i class="icon-pencil5"></i> Edit User</a></li>
										<li data-toggle="modal" data-target="#myModal"  onclick="warninguser('{{$user->id}}')" ><a><i class="icon-warning"></i>Warning</a></li>
										<!-- <li><a href="{{url('admin/view-user'.'/'.$user->id)}}"><i class="icon-eye"></i> View User</a></li> -->
									    <li><a href="{{url('admin/delete-user'.'/'.$user->id)}}"><i class="icon-folder-remove"></i>Delete User</a></li>

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
		</div>

		<div class="modal fade" id="myModal" role="dialog">
				  
				  <div class="modal-dialog">
					
				  
				   
				  <form action="{{url('admin/admin-warning')}}	" class="form-horizontal" enctype="multipart/form-data" method="post">
				   
				  @csrf
				  
					 <div class="modal-content">
						 <div class="modal-header">
					  
						  <h4 class="modal-title">Warning</h4>
					  </div>
					  <div class="modal-body">
						  <input type="hidden" name="userid" id="warningid">
						 <textarea name ="message" rows="5" cols="100"  class="form-control"> </textarea>
					  </div>
					  <div class="text-right">
						  <button type="submit" class="btn btn-primary">Send Warning <i class="icon-arrow-right14 position-right"></i></button>
					  </div>
					  </form>
				  </div>
			  
				  </div>
				 
			  </div>
		
		</div>

		<!-- /basic datatable -->
		<!-- Footer -->
		@include('admin.layout.footer') 
		<!-- /footer -->

	</div>
		<!-- /content area -->

</div>

<script>
		function warninguser(userid) {
			$('#warningid').val(userid);
		}
	</script>
<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
@endsection