@extends('admin.layout.master2')
@section('title', 'All List')
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
				
				<li class="active">All List</li>
			</ul>
   		</div>
	</div>
	@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
	<?php if(((Auth::guard('admin')->user()->product_listing)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
	<button type="button" onclick="window.location.href='{{url('admin/add-list')}}'" class="btn btn-primary" style="margin-bottom:20px;">Add List</button>
	<?php } ?>
	
	<select class="form-control" style="width:20%; margin-right: 10%; margin-left: 80%;"class="form-control" id="category_filter" name="Listing_type">
                                    <option value="" class="form-control">Please Select Listing</option>        
                                    @foreach($lists as $list)
                                    <option value="{{$list->id }}" onclick="listfilter('{{$list->name}}')">{{$list->name}} </option>
                                    @endforeach
                                  </select>
        <!-- Basic datatable -->
		
		
		<div class="panel panel-flat">
				<div class="table-responsive">
			<table class="table datatable-basic" style="" id="product_table" > 
              
				<thead>  
					<tr>
					    <th style="min-width: 180px;">Sr No.</th>
						<th style="min-width: 180px;">Listing Name</th>
						<th style="min-width: 180px;">Listing Category</th>
                        <th style="min-width: 180px;">Listing Type</th>   
						<th style="min-width: 180px;">SubCategory</th>   
						<th style="min-width: 180px;" >Sale Price</th>
						<th style="min-width: 180px;">Actual Price</th>
						<th style="min-width: 180px;">Discount Price</th>
						<th style="min-width: 180px;">SubTotal</th>

						<th style="min-width: 180px;">Quantity</th>
						<th style="min-width: 180px;" >Description</th>
                        <th style="min-width: 180px;" >State</th>
						<th style="min-width: 180px;">Image</th>
						<th style="min-width: 180px;">status</th>
						
						<?php if(((Auth::guard('admin')->user()->product_listing)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
						<th style="min-width: 180px;">Actions</th> 
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				@php($i=1)
				@foreach($products as $product)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$product->product_name}}</td>
						<td>{{$product->category}}</td>
						<td>{{$product->Listing_type}}</td>
                        <td>{{$product->maincategoryname}}</td>
						<td>{{$product->sale_price}}</td>
						<td>{{$product->actual_price}}</td>
						<td>{{$product->discount_price}}</td>
						<td>{{$product->sub_total}}</td>
						<td>{{$product->quantity}}</td>
						<td>{{$product->description}}</td>
						<td>{{$product->state}}</td>
						
						<?php 	
						 	//print_r($product->proimage); die;
						 ?>
						<td><img src="{{url('public/'.$product->proimage)}}" class="img-thumbnail" width="75" /></td>
						
						
						<td><a href="{{url('admin/active-inactive-all/'.$product->id)}}">@if($product->is_active ==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a></td>
						
						
						<?php if(((Auth::guard('admin')->user()->product_listing)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
						<td class="">
							<ul class="icons-list">  
								<li class="dropdown">	
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									    <!-- <li><a href="{{url('admin/add-product')}}"><i class="icon-user"></i>Add For Sale</a></li> -->

										
										<!-- <li><a href="{{url('admin/view-forsale'.'/'.$product->id)}}"><i class="icon-eye"></i>View</a></li> -->

										
										<li><a href="{{url('admin/edit-list'.'/'.$product->id)}}"><i class="icon-pencil5"></i>Edit</a></li>
										<li><a href="{{url('admin/delete-list'.'/'.$product->id)}}"><i class="icon-folder-remove"></i>Delete</a></li>
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
    function listfilter(listtype) {
        var dtable = $('#product_table').DataTable();
        dtable.column(3).search(listtype).draw();
           
    }
    </script>
@endsection