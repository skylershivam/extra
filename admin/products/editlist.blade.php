@extends('admin.layout.master2')
@section('title', 'Edit list')
@section('content')
<style>
.preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 100px;
    display: flex;
    padding: 5px 5px 0px 35px;
    position: relative;
    overflow: auto;
}


.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
</style>
<?php// echo $user->scores_count;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">For Edit List</li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
    
    <form action="{{url('admin/edit-list'.'/'.$products->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post">
    @csrf
    <div class="content">
		
        <!-- Horizontal form options -->
		<div class="panel panel-flat form-horizontal">
          
         
            
             <div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Product Name:</label>
					<div class="col-lg-9">
						
                        <input type="text"  name="product_name" value="{{$products->product_name}}" class="form-control" >
						<span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('product_name') }}</strong>
			            </span>
                    </div>
			    </div>
			
											
											
				<div class="form-group">
					<label class="col-lg-3 control-label">Category:</label>
					<div class="col-lg-9">
						
                        <input type="text"  name="category" value="{{$products->category}}" class="form-control" >
						<span class="invalid-feedback" role="alert" style="color: red">
			                 <strong>{{ $errors->first('category') }}</strong>
			            </span>
                    </div>
			    </div>


                <div class="form-group">
					<label class="col-lg-3 control-label">Listing Type</label>
					<div class="col-lg-9">
						
                        <input type="text"  name="Listing_type" value="{{$products->Listing_type}}" class="form-control" >
						<span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('Listing_type') }}</strong>
			            </span>
                    </div>
			    </div>
                        

				<div class="form-group">
					    <label class="col-lg-3 control-label">Main Categorie:</label>
					     <div class="col-md-6">
						 <input type="text"  name="maincategoryname" value="{{$products->maincategoryname}}" class="form-control" readonly >
						 <span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('maincategoryname') }}</strong>
								</span>
					     </div>
				</div>

               <div class="form-group">
					<label class="col-lg-3 control-label">Sale Price:</label>
					<div class="col-lg-9">
						<input type="text" name="sale_price" value="{{$products->sale_price}}" class="form-control">
					    <span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('sale_price') }}</strong>
			            </span> 
					</div>
				</div>
				
                <div class="form-group">
					<label class="col-lg-3 control-label">Actual Price:</label>
					<div class="col-lg-9">
						<input type="text" name="actual_price" value="{{$products->actual_price}}"  class="form-control">
					    <span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('actual_price') }}</strong>
			            </span>
					</div>
				</div>

                
				
				
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Discount Price:</label>
					<div class="col-lg-9">
						<input type="text" name="discount_price" value="{{$products->discount_price}}" class="form-control">
						<span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('discount_price') }}</strong>
			            </span> 
					</div>
				</div>

                <div class="form-group">
					<label class="col-lg-3 control-label">Quantity</label>
					<div class="col-lg-9">
						<input type="text" name="quantity" value="{{$products->quantity}}"  class="form-control">
					    <span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('quantity') }}</strong>
			            </span>
					</div>
				</div>

                <div class="form-group">
					<label class="col-lg-3 control-label">Description:</label>
					<div class="col-lg-9">
						
                        <textarea name = "description"  rows="10" cols="50" class="form-control">{{$products->description}}</textarea>
					    <span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('description') }}</strong>
			            </span>
					</div>                
				</div>
                <div class="form-group">
					<label class="col-lg-3 control-label">Location:</label>
					<div class="col-lg-9">
						<input type="text" name="location" value="{{$products->state}}" class="form-control">
						<span class="invalid-feedback" role="alert" style="color: red">
			                <strong>{{ $errors->first('location') }}</strong>
			            </span> 
					</div>
				</div>
                  
				<div class="form-group">
					<h5 class="border-0"> UPLOAD UPTO 12 PHOTOS </h5>
					
					<div class="col-lg-9">
									
									
								
								<a href="javascript:void(0)" onclick="$('#pro-image').click()">Add Photos</a>
								<input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" accept="image/*" multiple>
								
									<div class="preview-images-zone">
									</div>
									
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
			$(document).ready(function() {
			document.getElementById('pro-image').addEventListener('change', readImage, false);
			$( ".preview-images-zone" ).sortable();
			
			$(document).on('click', '.image-cancel', function() {
			let no = $(this).data('no');
			$(".preview-image.preview-show-"+no).remove();
			});
			});
			var num = 4;
			function readImage() {
			if (window.File && window.FileList && window.FileReader) {
			var files = event.target.files; //FileList object
			var output = $(".preview-images-zone");
			for (let i = 0; i < files.length; i++) {
			var file = files[i];
			if (!file.type.match('image')) continue;
			
			var picReader = new FileReader();
			
			picReader.addEventListener('load', function (event) {
			var picFile = event.target;
			var html =  '<div class="preview-image preview-show-' + num + '">' +
				'<div class="image-cancel" data-no="' + num + '">x</div>' +
				'<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
				'<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image"></a></div>' +
			'</div>';
			output.append(html);
			num = num + 1;
			});
			picReader.readAsDataURL(file);
			}
			// $("#pro-image").val('');
			
			$("#pro-image").attr('name', 'pro-image[]');
			
			} else {
			console.log('Browser not support');
			}
			}

			</script>

@endsection