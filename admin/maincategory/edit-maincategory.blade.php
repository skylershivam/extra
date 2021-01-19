@extends('admin.layout.master2')
@section('title', 'Edit Category')
@section('content')
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Edit Category</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
							<!-- Basic layout-->
							<form action="{{url('admin/edit-maincategory'.'/'.$newstore->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="panel panel-flat">
                        			<div class="panel-body">
										
										
									<div class="form-group ">
										<label class="col-lg-3 control-label">Main Category:</label>


									<div class="col-md-6">
												
 
                                <select class="form-control" class="form-control" name="category" value="{{$newstore->category}}">
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
                                
 
                                <select class="form-control" class="form-control" name="Listing_type" value="{{$newstore->Listing_type}}" id="listingcontoller">
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
							
								<input type="text"  name="maincategoryname" class="form-control" value="{{$newstore->maincategoryname}}" >
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('maincategoryname') }}</strong>
								</span>
							</div>
						</div>		


										


										
										<div class="form-group">
											<label class="col-lg-3 control-label">Image:</label>
											<div class="col-lg-9">
												<input type="file" name="image" class="file-styled" id="imgthumb" accept="image/*">
												<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												
												
											

												<img src="{{ URL::to('/') }}/public/images/{{$newstore->image}}" id="img-preview" class="img-thumbnail" width="75" />
												
 
  												
												 
			                                    </span>
											</div>
										</div>
									
                                       		@csrf
										
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
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
	

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


