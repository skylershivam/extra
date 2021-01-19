<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" sizes="15x15" href="{{url('public/images/fav.png')}}">
		<title>@yield('title')</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="{{asset('public/admin/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('public/admin/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('public/admin/assets/css/core.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('public/admin/assets/css/components.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('public/admin/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
		<!-- Global stylesheets -->
		<!-- Core JS files -->
		<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/pace.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/blockui.min.js')}}"></script>
		<!-- /core JS files -->
		<style type="text/css">
		.navbar-brand > img {
		margin-top: -6px;
		height: 30px;
		
		}
		</style>
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{url('admin/dashboard')}}"><img src="{{url(env('PROJECT_LOGO'))}}"   width="100px" alt=""> </a><div style="margin-top:10px; margin-bottom:10px;">{{--env('PROJECT_NAME')--}}</div>
				<ul class="nav navbar-nav visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
					<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
			</div>
			<div class="navbar-collapse collapse" id="navbar-mobile">
				<ul class="nav navbar-nav">
					<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
				
			</div>
		</div>
		<!-- /main navbar -->
		<!-- Page container -->
		<div class="page-container">
			<!-- Page content -->
			<div class="page-content">
				<!-- Main sidebar -->
				<div class="sidebar sidebar-main">
					<div class="sidebar-content">
						<!-- User menu -->
						<div class="sidebar-user">
							<div class="category-content">
								<div class="media">
								  
									<a href="#" class="media-left"><img src="" class="img-circle img-sm" alt=""></a>
									<div class="media-body">
										<span class="media-heading text-semibold">{{Auth::guard('admin')->user()->name}}</span>
										<!-- <div class="text-size-mini text-muted">
												<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
										</div> -->
									</div>
									<!-- <div class="media-right media-middle">
											<ul class="icons-list">
													<li>
															<a href="#"><i class="icon-cog3"></i></a>
													</li>
											</ul>
									</div> -->
								</div>
							</div>
						</div>
						<!-- /user menu -->
						<!-- Main navigation -->
						<div class="sidebar-category sidebar-category-visible">
							<div class="category-content no-padding">
								<ul class="navigation navigation-main navigation-accordion">
									<!-- Main -->
									<!-- Dashboard -->
									<li class="{{request()->is('admin/dashboard') || request()->is('admin/dashboard-monthly') ? 'active' : ''}}"><a href="{{url('admin/dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
									<!-- Users -->
									<li class="{{request()->is('admin/users-list')}}">
										<a href="#"><i class="icon-copy"></i> <span>Users Management</span></a>
										<ul>
											<li class="{{request()->is('admin/users-list') || request()->is('admin/view-user/*') ? 'active' : ''}}">
												<a href="{{url('admin/users-list')}}"><i class="icon-users2"></i> <span>Users</span></a>
											</li>
											<!-- <li class="{{request()->is('admin/business-list') || request()->is('admin/view-business/*') ? 'active' : ''}}">
												<a href="{{url('admin/business-list')}}"><i class="icon-users2"></i> <span>Business</span></a>
											</li> -->
										</ul>
									</li>
									
									
									<!-- Business -->
									<!-- <li class="{{request()->is('admin/business-list') || request()->is('admin/view-business/*') || request()->is('admin/view-reviews/*') || request()->is('admin/view-forums/*') || request()->is('admin/view-comments/*') ? 'active' : ''}}">
											<a href="{{url('admin/business-list')}}"><i class="icon-list2"></i> <span>Business</span></a>
									</li> -->
									
									
									
									<!-- Categories -->
									<li class="{{request()->is('admin/add-category') || request()->is('admin/add-sell-category') || request()->is('admin/edit-category') || request()->is('admin/add-sub-category') || request()->is('admin/edit-sell-category')  || request()->is('admin/category-list') || request()->is('admin/sell-category-list')  ? 'active' : ''}}">
										<a href="#"><i class="icon-copy"></i> <span>Category</span></a>
										<ul>
											{{-- <li class="{{request()->is('admin/sell-categories-list') ? 'active' : ''}}"><a href="{{url('admin/sell-categories-list')}}">Sell Categories</a></li> --}}
											<li class="{{request()->is('admin/categories-list') ? 'active' : ''}}"><a href="{{url('admin/categories-list')}}">Categories</a></li>
											<!-- <li class="{{request()->is('admin/sub-categories-list') ? 'active' : ''}}"><a href="{{url('admin/sub-categories-list')}}">Sub Categories</a></li> -->
										</ul>
									</li>


                                    <li class="{{request()->is('admin/listing-type')}}">
										<a href="#"><i class="icon-copy"></i> <span>Listing Types</span></a>
										<ul>
											<li class="{{request()->is('admin/listing-type') ? 'active' : ''}}"><a href="{{url('admin/listing-type')}}">Listing</a></li>
										</ul>
									</li>   



									
									<li class="{{request()->is('admin/every-list')}}">
										<a href="#"><i class="icon-copy"></i> <span>Product Listing</span></a>
										<ul>
											<li class="{{request()->is('admin/every-list') ? 'active' : ''}}"><a href="{{url('admin/every-list')}}">Every List</a></li>
										</ul>
									</li>    

									<!-- <li class="{{request()->is('admin/pending-list') ||  request()->is('admin/view-pending/*') ||  request()->is('admin/delivered-list') ||  request()->is('admin/view-delivered/*')  ? 'active' : ''}}">
										<a href="#"><i class="icon-file-text"></i> <span>Deliveries</span></a>
										<ul>
											<li class="{{request()->is('admin/pending-list') || request()->is('admin/view-pending/*') ? 'active' : ''}}"><a href="{{url('admin/pending-list')}}">Deliveries List</a></li>
										</ul>

										{{-- <ul>
											<li class="{{request()->is('admin/delivered-list') || request()->is('admin/view-delivered/*') ? 'active' : ''}}"><a href="{{url('admin/delivered-list')}}">Delivered</a></li>
										</ul> --}}
									</li> -->

									
 
									<li class="{{request()->is('admin/blogs-list') || request()->is('admin/add-blog') || request()->is('admin/edit-blog/*') ? 'active' : ''}}">
									<a href="{{url('admin/blogs-list')}}"><i class="icon-blog"></i> <span>Blogs</span></a>
									</li>

									<!-- <li class="{{request()->is('admin/companies-list') || request()->is('admin/view-company/*')  ? 'active' : ''}}"><a href="{{url('admin/companies-list')}}"><i class="icon-bus"></i> <span>Delivery Companies</span></a></li> -->
									
									<li class="{{request()->is('admin/reports-list') || request()->is('admin/view-report/*')  ? 'active' : ''}}"><a href="{{url('admin/reports-list')}}"><i class="icon-magazine"></i> <span>Reports</span></a></li>
									<li class="{{request()->is('admin/reports-type') || request()->is('admin/view-report/*')  ? 'active' : ''}}"><a href="{{url('admin/reports-type')}}"><i class="icon-magazine"></i> <span>Reports Type</span></a></li>

									<li class="{{request()->is('admin/badge-requests') || request()->is('admin/view-request/*')  ? 'active' : ''}}"><a href="{{url('admin/badge-requests')}}"><i class="icon-spotlight2"></i> <span>Badges</span></a></li>
									

									<!-- Subscription Plans -->
								<li class="{{request()->is('admin/subscription-plan-list') || request()->is('admin/edit-subscription-plan/*') ? 'active' : ''}}">
									<a href="{{url('admin/subscription-plan-list')}}"><i class="icon-cash3"></i> <span>Subscription Plans</span></a>
								</li>

								<!-- Subscriptions-->
								<li class="{{request()->is('admin/subscriptions-list') || request()->is('admin/subscription-detail/*') || request()->is('admin/view-subscription-history/*') ? 'active' : ''}}">
									<a href="{{url('admin/subscriptions-list')}}"><i class="icon-basket"></i> <span>Subscriptions</span></a>
								</li>
								<!-- <li class="{{request()->is('admin/return-refunds') || request()->is('admin/edit-return-refunds/*')  ? 'active' : ''}}">
									<a href="{{url('admin/return-refunds')}}"><i class="icon-magazine"></i> <span>Return Refunds</span></a>
								</li> -->

                                <!-- <li class="{{request()->is('admin/add-category') || request()->is('admin/add-sell-category') || request()->is('admin/edit-category') || request()->is('admin/add-sub-category') || request()->is('admin/edit-sell-category')  || request()->is('admin/category-list') || request()->is('admin/sell-category-list')  ? 'active' : ''}}">
										<a href="#"><i class="icon-copy"></i> <span>Oders</span></a>
										<ul>
										    <li class="{{request()->is('admin/view-customeroders') ? 'active' : ''}}"><a href="{{url('admin/view-customeroders')}}">Customer</a></li>
											<li class="{{request()->is('admin/view-sellerorders') ? 'active' : ''}}"><a href="{{url('admin/view-sellerorders')}}">Seller</a></li>
											<!-- <li class="{{request()->is('admin/sub-categories-list') ? 'active' : ''}}"><a href="{{url('admin/sub-categories-list')}}">Sub Categories</a></li> -->
										<!-- </ul>
									</li> -->

									





	  								<li class="{{request()->is('admin/update-image')}}">
										<a href="#"><i class="icon-cog5"></i> <span>Setting</span></a>
										<ul>
											
											<li class="{{request()->is('admin/update-image') ? 'active' : ''}}"><a href="{{url('admin/update-image')}}"> Edit Profile</a></li>
										    <li class="{{request()->is('admin/change-password') ? 'active' : ''}}"><a href="{{url('admin/change-password')}}"> Change Password</a></li>
											<li class="{{request()->is('admin/logout') ? 'active' : ''}}"><a href="{{url('admin/logout')}}">Logout</a></li>
										</ul>
									</li>    
								






								<!-- Contents -->
									<li class="{{request()->is('admin/about-us') || request()->is('admin/terms-and-conditions') || request()->is('admin/privacy-policy') ? 'active' : ''}}">
										<a href="#"><i class="icon-copy"></i> <span>App Contents</span></a>
										<ul>
											<li class="{{request()->is('admin/about-us') ? 'active' : ''}}"><a href="{{url('admin/about-us')}}">About Us</a></li>
											<li class="{{request()->is('admin/terms-and-conditions') ? 'active' : ''}}"><a href="{{url('admin/terms-and-conditions')}}">Terms & Conditions</a></li>
											<li class="{{request()->is('admin/privacy-policy') ? 'active' : ''}}"><a href="{{url('admin/privacy-policy')}}">Privacy Policy</a></li>
											<li class="{{request()->is('admin/billing-policy') ? 'active' : ''}}"><a href="{{url('admin/billing-policy')}}">Billing Policy</a></li>
											<li class="{{request()->is('admin/refund-policy') ? 'active' : ''}}"><a href="{{url('admin/refund-policy')}}">Refund Policy</a></li>
											<li class="{{request()->is('admin/safety') ? 'active' : ''}}"><a href="{{url('admin/safety')}}">Safety</a></li>
											<li class="{{request()->is('admin/shipping') ? 'active' : ''}}"><a href="{{url('admin/shipping')}}">Shipping</a></li>
											<li class="{{request()->is('admin/buying') ? 'active' : ''}}"><a href="{{url('admin/buying')}}">Buying</a></li>
										</ul>
									</li>
									<!-- /main -->
								</ul>
							</div>
						</div>
						<!-- /main navigation -->
					</div>
				</div>
				<!-- /main sidebar -->
				<!-- Main content -->
				@yield('content')
			</div>
			<!-- /page content -->
		</div>
		<!-- /page container -->
		<script type="text/javascript">
			$(".msg").show().delay(2000).fadeOut();
		</script>
	</body>
</html>