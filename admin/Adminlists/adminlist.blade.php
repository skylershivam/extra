@extends('admin.layout.master2')
@section('title', 'admins')
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
				
				<li class="active">Admins</li>
                
	 
        </div>		
	
		     
					
			
			
			
	
	
	
	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<?php if((Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
	  
	    
	    <button type="button" onclick="window.location.href='{{url('admin/add-admin')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add Employess</button>
	<?php } ?>
		<!-- Basic datatable -->
	<div class="panel panel-flat">
			<table class="table datatable-basic">
				<thead>  
					<tr>
					  <th>Sr No.</th>
            		  <th>Name</th>
            		  <th>Image</th>
					  <th>Login</th>
				      <th>Logout</th>
					  <th>Status</th>
						
						
					<th class="text-center">Actions</th> 
						
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($users as $user)
					<tr> 
						<td>{{$i++}}</td>
						<td>{{$user->name}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $user->image}}" class="img-thumbnail" width="75" /></td>

						<td>{{$user->login }}</td>
						<?php if((Auth::guard('admin')->user()->logout)!='null'){ ?>
						<td>{{$user->logout }}</td>
						<?php } ?>
						
						<td>{{$user->status }}</td>	
						
					
						
                       
					
							<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
									    <li><a href="{{url('admin/admin-edit'.'/'.$user->id)}}"><i class="icon-pencil5"></i> Edit</a></li>
										
										                                                                                                         
										<li><a href="{{url('admin/delete-admin'.'/'.$user->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>

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
	<script>
		function warninguser(userid) {
			$('#warningid').val(userid);
		}
	</script>
@endsection 