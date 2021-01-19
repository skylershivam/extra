@extends('admin.layout.master2')
@section('title', 'Add Sub Category')
@section('content')
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Add Sub Category</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/add-maincategory')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
									
									
					<div class="form-group ">
						<label class="col-lg-3 control-label">Main Category:</label>


                     <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="category">
                                    <option value="" class="form-control">Please Select Main Category</option>        
                                    
									
									
									
									@foreach($categories as $category)
                                    <option onclick="list{{$category->id}}()">{{$category->name}} </option>
                                    @endforeach
                                  </select>
								  <span class="invalid-feedback" role="alert" style="color: red">
									 <strong>{{ $errors->first('category') }}</strong>
			                      </span>
						    </div>
                    </div>
					
					
					<div class="form-group ">
						<label class="col-lg-3 control-label">Listing Type:</label>


                            <div class="col-md-6">
                                
 
                                <select class="form-control" class="form-control" name="Listing_type" id="listingcontoller">
                                    <option value="" class="form-control">Please Select Listing</option>        
                                    
                                  </select>
								  <span class="invalid-feedback" role="alert" style="color: red">
									 <strong>{{ $errors->first('Listing_type')}}</strong>
			                      </span>
                            </div>
                    </div> 
									
									
									
									
				

                            				
	
						<div class="form-group">
							<label class="col-lg-3 control-label">Sub Category:</label>
							<div class="col-lg-9">
								<input type="text"  name="maincategoryname" class="form-control" >
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('maincategoryname') }}</strong>
								</span>
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
										
										
									
                                       		@csrf
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
<script type="text/javascript">
		function readURL(input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#blah').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}

$("#imgInp").change(function() {
  readURL(this);
});
	</script>	
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>

	<script>
		function warninguser(listid) {
			$('#warningid').val(listid);
		}
		function list21() {
			$('#listingcontoller option:not(:first)').remove();
			$('#listingcontoller').append(new Option('Free','Free'));
			$('#listingcontoller').append(new Option('Wanted','Wanted'));
            $('#listingcontoller').append(new Option('Torent','Torent'));
			$('#listingcontoller').append(new Option('Swap','Swap'));
			$('#listingcontoller').append(new Option('Lost','Lost'));
			$('#listingcontoller').append(new Option('Found','Found'));
			$('#listingcontoller').append(new Option('Forsale','Forsale'));

		}
		function list22() {
			$('#listingcontoller option:not(:first)').remove();
			$('#listingcontoller').append(new Option('Free','Free'));
			$('#listingcontoller').append(new Option('Wanted','Wanted'));
            
			$('#listingcontoller').append(new Option('Swap','Swap'));
			$('#listingcontoller').append(new Option('Lost','Lost'));
			$('#listingcontoller').append(new Option('Found','Found'));
			$('#listingcontoller').append(new Option('Forsale','Forsale'));

		}
		function list23() {
			$('#listingcontoller option:not(:first)').remove();
			$('#listingcontoller').append(new Option('Wanted','Wanted'));
            $('#listingcontoller').append(new Option('Torent','Torent'));
			$('#listingcontoller').append(new Option('Swap','Swap'));
			
			$('#listingcontoller').append(new Option('Forsale','Forsale'));

		}
		function list24() {
			$('#listingcontoller option:not(:first)').remove();
			$('#listingcontoller').append(new Option('Free','Free'));
			$('#listingcontoller').append(new Option('Wanted','Wanted'));
            
			$('#listingcontoller').append(new Option('Swap','Swap'));
			
			$('#listingcontoller').append(new Option('Forsale','Forsale'));

		}
		
	</script>


@endsection


