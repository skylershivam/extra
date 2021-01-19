@extends('admin.layout.master2')
@section('title', 'Subscription Plans')
@section('content')
<style type="text/css">
	.thumb img:not(.media-preview) {
    display: inline-block;
    width: 100%;
    max-width: 100%;
    height: 200px;
}

</style>
<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							
							<li class="active">Subscription Plans</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					@foreach($subscription_plans as $subscription_plan)
					<div class="col-lg-3 col-md-6">
							<div class="thumbnail no-padding">
								
								
								
								<?php if($subscription_plan->plan_name=="Gold"){  ?>
								<div class="caption text-center" style="background-color:#faa520; text:white; min-height:20rem">
						    		<h6 class="text-semibold no-margin" style="color:black">{{$subscription_plan->plan_name}}<strong class="display-block">&#163;{{$subscription_plan->price}}</strong></h6>
									<h6 class="text-semibold no-margin" style="color:black" >{{$subscription_plan->description}}</h6>
									<?php if(((Auth::guard('admin')->user()->subscription_plans)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<button type="button" onclick="window.location.href='{{url('admin/edit-subscription-plan/'.$subscription_plan->id)}}'" class="btn btn-primary">Edit</button>
									<?php } ?>

								</div>

									<?php } ?>
								<?php if($subscription_plan->plan_name=="Silver"){  ?>
								<div class="caption text-center" style="background-color:#c6c7c8; text:white; min-height:20rem">
						    		<h6 class="text-semibold no-margin" style="color:black">{{$subscription_plan->plan_name}}<strong class="display-block">&#163;{{$subscription_plan->price}}</strong></h6>
									<h6 class="text-semibold no-margin" style="color:black" >{{$subscription_plan->description}}</h6>
									<?php if(((Auth::guard('admin')->user()->subscription_plans)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<button type="button" onclick="window.location.href='{{url('admin/edit-subscription-plan/'.$subscription_plan->id)}}'" class="btn btn-primary">Edit</button>
									<?php } ?>

								</div>
									<?php } ?>

							<?php if($subscription_plan->plan_name=="Blue"){  ?>
								<div class="caption text-center" style="background-color:#0f52ba; text:white; min-height:20rem">
						    		<h6 class="text-semibold no-margin" style="color:white">{{$subscription_plan->plan_name}}<strong class="display-block">&#163;{{$subscription_plan->price}}</strong></h6>
									<h6 class="text-semibold no-margin" style="color:white" >{{$subscription_plan->description}}</h6>
									<?php if(((Auth::guard('admin')->user()->subscription_plans)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<button type="button" onclick="window.location.href='{{url('admin/edit-subscription-plan/'.$subscription_plan->id)}}'" class="btn btn-primary">Edit</button>
									<?php } ?>

								</div>
									<?php } ?>
                              

					    	</div>
						</div>
						@endforeach

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
@endsection


