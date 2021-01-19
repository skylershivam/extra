@extends('admin.layout.master2')
@section('title', 'ForSale')
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
</style>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">For Sale</li>
			</ul>
   		</div>
	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
    <button type="button" onclick="window.location.href='{{url('admin/add-forsale')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add data</button>

        <!-- Basic datatable -->
		<div class="panel panel-flat">
				<table class="table datatable-basic" style="table-layout:fixed;" > 
				<thead>  
					<tr>
					    <th>Sr No.</th>
						<th>Listing Name</th>
						<th>Category </th>
						<th>Sale Price</th>
						<th>Actual Price</th>
						<th>Discount Price</th>
						<th>Quantity</th>
						<th>Description</th>  
						<th>Image</th>
						<th>status</th>
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($losts as $lost)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$lost->product_name}}</td>
						<td>{{$lost->category}}</td>
						<td>{{$lost->sale_price}}</td>
						<td>{{$lost->actual_price}}</td>
						<td>{{$lost->discount_price}}</td>
						<td>{{$lost->quantity}}</td>
						<td>{{$lost->description}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $lost->image}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-lost/'.$lost->id)}}">@if($lost->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-lost')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-lost'.'/'.$lost->id)}}"><i class="icon-eye"></i>View</a></li>
										<li><a href="{{url('admin/delete-lost'.'/'.$lost->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-lost'.'/'.$lost->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
 
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
													
                    @foreach($swaps as $swap)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$swap->product_name}}</td>
						<td>{{$swap->category}}</td>
						<td>{{$swap->sale_price}}</td>
						<td>{{$swap->actual_price}}</td>
						<td>{{$swap->discount_price}}</td>
						<td>{{$swap->quantity}}</td>
						<td>{{$swap->description}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $swap->image}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-swap/'.$swap->id)}}">@if($swap->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-swap')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-swap'.'/'.$swap->id)}}"><i class="icon-eye"></i>View</a></li>
										<li><a href="{{url('admin/delete-swap'.'/'.$swap->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-swap'.'/'.$swap->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
    
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
                    @foreach($founds as $found)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$found->product_name}}</td>
						<td>{{$found->category}}</td>
						<td>{{$found->sale_price}}</td>
						<td>{{$found->actual_price}}</td>
						<td>{{$found->discount_price}}</td>
						<td>{{$found->quantity}}</td>
						<td>{{$found->description}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $found->image}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-found/'.$found->id)}}">@if($found->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-found')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-found'.'/'.$found->id)}}"><i class="icon-eye"></i>View</a></li>

										<li><a href="{{url('admin/delete-found'.'/'.$found->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-found'.'/'.$found->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
										
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach

                    @foreach($frees as $free)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$free->product_name}}</td>
						<td>{{$free->category}}</td>
						<td>{{$free->sale_price}}</td>
						<td>{{$free->actual_price}}</td>
						<td>{{$free->discount_price}}</td>
						<td>{{$free->quantity}}</td>
						<td>{{$free->description}}</td>
						
						<td><img src="{{ URL::to('/') }}/public/images/{{$free->image}}" class="img-thumbnail" width="75" /></td>

						
						<td><a href="{{url('admin/active-inactive-free/'.$free->id)}}">@if($free->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-free')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-free'.'/'.$free->id)}}"><i class="icon-eye"></i>View</a></li>
										<li><a href="{{url('admin/delete-free'.'/'.$free->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-free'.'/'.$free->id)}}"><i class="icon-pencil5"></i>Edit</a></li>

									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach

                    @foreach($forsales as $forsale)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$forsale->product_name}}</td>
						<td>{{$forsale->category}}</td>
						<td>{{$forsale->sale_price}}</td>
						<td>{{$forsale->actual_price}}</td>
						<td>{{$forsale->discount_price}}</td>
						<td>{{$forsale->quantity}}</td>
						<td>{{$forsale->description}}</td>
						<td><img src="{{ URL::to('/') }}/public/images/{{ $forsale->image}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-forsale/'.$forsale->id)}}">@if($forsale->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-forsale')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-forsale'.'/'.$forsale->id)}}"><i class="icon-eye"></i>View</a></li>

										
										<li><a href="{{url('admin/edit-forsale'.'/'.$forsale->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
										<li><a href="{{url('admin/delete-forsale'.'/'.$forsale->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach


                    @foreach($wanteds as $wanted)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$wanted->product_name}}</td>
						<td>{{$wanted->category}}</td>
						<td>{{$wanted->sale_price}}</td>
						<td>{{$wanted->actual_price}}</td>
						<td>{{$wanted->discount_price}}</td>
						<td>{{$wanted->quantity}}</td>
						<td>{{$wanted->description}}</td>
                        <td><img src="{{ URL::to('/') }}/public/images/{{$wanted->image}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-wanted/'.$wanted->id)}}">@if($wanted->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-wanted')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-wanted'.'/'.$wanted->id)}}"><i class="icon-eye"></i>View</a></li>
										<li><a href="{{url('admin/delete-wanted'.'/'.$wanted->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-wanted'.'/'.$wanted->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
 
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach

                    
                
                    @foreach($torents as $torent)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$torent->product_name}}</td>
						<td>{{$torent->category}}</td>
						<td>{{$torent->sale_price}}</td>
						<td>{{$torent->actual_price}}</td>
						<td>{{$torent->discount_price}}</td>
						<td>{{$torent->quantity}}</td>
						<td>{{$torent->description}}</td>
                        <td><img src="{{ URL::to('/') }}/public/images/{{$torent->image}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-torent/'.$torent->id)}}">@if($torent->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						<td class="text-center">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-torent')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<li><a href="{{url('admin/view-torent'.'/'.$torent->id)}}"><i class="icon-eye"></i>View</a></li>
										<li><a href="{{url('admin/delete-torent'.'/'.$torent->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
										<li><a href="{{url('admin/edit-torent'.'/'.$torent->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
 
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
@endsection