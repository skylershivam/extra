@extends('admin.layout.master2')
@section('title', 'Edit Product')
@section('content')
<?php// echo $user->scores_count;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">For Sale Edit Product</li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
    
    <form action="{{url('admin/edit-forsale'.'/'.$products->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post">
    @csrf
    <div class="content">
		
        <!-- Horizontal form options -->
		<div class="panel panel-flat form-horizontal">
          
         
            
             <div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Product Name:</label>
					<div class="col-lg-9">
						
                        <input type="text"  name="product_name" value="{{$products->product_name}}" class="form-control" >
                           
                    </div>
			    </div>
			
											
											
					
						
					
                
                
						
                        <div class="form-group ">
						<label class="col-lg-3 control-label">Category:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="category" value="{{$products->category}}">
                                
                                    <option value="" class="form-control">Please Select Category</option>        
                                    @foreach($categories as $category)
                                    <option >{{$category->name}} </option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>



                <div class="form-group">
					<label class="col-lg-3 control-label">Sale Price:</label>
					<div class="col-lg-9">
						<input type="text" name="sale_price" value="{{$products->sale_price}}" class="form-control">
					</div>
				</div>
				
                <div class="form-group">
					<label class="col-lg-3 control-label">Actual Price:</label>
					<div class="col-lg-9">
						<input type="text" name="actual_price" value="{{$products->actual_price}}"  class="form-control">
					</div>
				</div>

                <div class="form-group">
					<label class="col-lg-3 control-label">Discount Price:</label>
					<div class="col-lg-9">
						<input type="text" name="discount_price" value="{{$products->discount_price}}" class="form-control">
					</div>
				</div>

                <div class="form-group">
					<label class="col-lg-3 control-label">Quantity</label>
					<div class="col-lg-9">
						<input type="text" name="quantity" value="{{$products->quantity}}"  class="form-control">
					</div>
				</div>

                <div class="form-group">
					<label class="col-lg-3 control-label">Description:</label>
					<div class="col-lg-9">
						
                        <textarea name = "description"  rows="10" cols="50" class="form-control">{{$products->description}}</textarea>
					</div>                
				</div>

                
                <div class="form-group">
                  <label for="image" class="col-lg-3 control-label">Upload Image</label>

                <div class="col-lg-9">
                    <input  type="file" class="form-control" name="image" value="{{$products->image}}" >
                   </div>
                </div> 
                
                
                
                
                <div class="text-right">
					<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
				</div>
                
            </div>
           
        </div>
		<!-- Footer -->
		@include('admin.layout.footer')
		<!-- /footer -->
	</div>
    </form>
   
	<!-- /content area -->
   
</div>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
@endsection