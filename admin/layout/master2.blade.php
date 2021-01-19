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
		
		<!-- For script -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Global stylesheets -->
		<!-- Core JS files -->
		<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/pace.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/blockui.min.js')}}"></script>
		<!-- /core JS files -->
		
		<!-- /Ckeditor -->
		<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>  
		
		
		
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
				<a class="navbar-brand" href="{{url('admin/dashboard')}}"><img src="{{url(env('PROJECT_LOGO'))}}"   alt=""> </a><div style="margin-top:10px; margin-bottom:10px;">{{--env('PROJECT_NAME')--}}</div>
				<ul class="nav navbar-nav visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
					<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
			</div>
			<div class="navbar-collapse collapse" id="navbar-mobile">
				<ul class="nav navbar-nav">
					<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li class="dropdown dropdown-user">
							
							
								
								
								<div style="margin-bottom:10px; margin-top:10px"><a href="{{url('admin/logout'.'/'.Auth::guard('admin')->user()->id)}}"><i class="icon-switch2" ></i> Logout</a></div>
							
						</li>
					</ul>
				</div>
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
								<a href="" class="media-left"><img src="{{url('public/images/'.Auth::guard('admin')->user()->image)}}" class="img-circle img-sm" alt=""></a>

									
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
									<li class="{{request()->is('admin/dashboard') || request()->is('admin/dashboard-monthly')||request()->is('admin/dashboard-yearly/*') ? 'active' : ''}}"><a href="{{url('admin/dashboard')}}"><img src="{{url('public/images/png/dashboard.png')}}" style="width: 26px;height: 26px;"> <span>Dashboard</span></a></li>
									<!-- Users -->
									
									
									<?php if(((Auth::guard('admin')->user()->users_managment )=='Read&Write')||((Auth::guard('admin')->user()->users_managment )=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
									<li class="{{request()->is('admin/users-list')||request()->is('admin/adduser')||request()->is('admin/edit-user/*')  ? 'active' : ''}}">

									
										<a href=""><img src="{{url('public/images/png/user.png')}}" style="width: 26px;height: 26px;">  <span>Users Management</span></a>
										<ul>
											<li class="{{request()->is('admin/users-list')||request()->is('admin/view-user/*') ? 'active' : ''}}">
												<a href="{{url('admin/users-list') }} "><img src="{{url('public/images/png/userlist.png')}}" style="width: 26px;height: 26px;"> <span>Users</span></a>
											</li>
										</ul>
									</li>
									<?php } ?>
									
									

									





									<?php if((Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<li class="{{request()->is('admin/admins-list') || request()->is('admin/admin-edit/*') || request()->is('admin/add-permission') || request()->is('admin/add-role') || request()->is('admin/add-admin')||request()->is('admin/edit-role/*')  ? 'active' : ''}}">

									
                                        <a href=""><img src="{{url('public/images/png/admin.png')}}" style="width: 26px;height: 26px;">  <span>Admin Management</span></a>
                                        <ul>
										
										
										<li class="  {{request()->is('admin/admins-list')||request()->is('admin/add-admin')|| request()->is('admin/admin-edit/*')  ? 'active' : ''}}">
												<a href="{{url('admin/admins-list')}} "><img src="{{url('public/images/png/userlist.png')}}" style="width: 26px;height: 26px;"> <span>Admins</span></a>
											</li>
										
                                           
										   <li class="{{request()->is('admin/permission-list')||request()->is('admin/add-permission')||request()->is('admin/edit-permission/*') ? 'active' : ''}}">
												<a href="{{url('admin/permission-list')}} "><img src="{{url('public/images/png/userlist.png')}}" style="width: 26px;height: 26px;"> <span>Admin Permission</span></a>
											</li>
											
											
											<li class="{{request()->is('admin/role-list')||request()->is('admin/edit-role/*')||request()->is('admin/add-role') ? 'active' : ''}}">
												<a href="{{url('admin/role-list')}} "><img src="{{url('public/images/png/userlist.png')}}" style="width: 26px;height: 26px;"> <span>Admin Role</span></a>
											</li>
											
										</ul>
                                    </li>

											

											<?php } ?>
									<!-- Business -->
									<!-- <li class="{{request()->is('admin/business-list') || request()->is('admin/view-business/*') || request()->is('admin/view-reviews/*') || request()->is('admin/view-forums/*') || request()->is('admin/view-comments/*') ? 'active' : ''}}">
											<a href="{{url('admin/business-list')}}"><i class="icon-list2"></i> <span>Business</span></a>
									</li> -->
									
									
									
									<!-- Categories -->
									<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||((Auth::guard('admin')->user()->category)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin') { ?>

									<li class="{{request()->is('admin/add-category') || request()->is('admin/add-maincategory') || request()->is('admin/edit-category/*') || request()->is('admin/add-subcategory')|| request()->is('admin/edit-maincategory/*') || request()->is('admin/edit-subcategory/*') || request()->is('admin/add-sub-category') || request()->is('admin/edit-sell-category')  || request()->is('admin/category-list') || request()->is('admin/sell-category-list')  ? 'active' : ''}}">
										<a href="{{url('admin/categories-list')}}"><img src="{{url('public/images/png/category.png')}}" style="width: 26px;height: 26px;"><span>Category</span></a>
										<ul>
											
											<li class="{{request()->is('admin/categories-list')|| request()->is('admin/add-category')|| request()->is('admin/edit-category/*')  ? 'active' : ''}}"><a href="{{url('admin/categories-list')}}"><img src="{{url('public/images/png/todo.png')}}" style="width: 26px;height: 26px;">Main Categories</a></li>
											<li class="{{request()->is('admin/maincategories-list')|| request()->is('admin/add-maincategory')|| request()->is('admin/edit-maincategory/*') ? 'active' : ''}}"><a href="{{url('admin/maincategories-list')}}"><img src="{{url('public/images/png/newlist.png')}}" style="width: 26px;height: 26px;">Sub Categories</a></li>
  
											<!-- <li class="{{request()->is('admin/sub-categories-list') ? 'active' : ''}}"><a href="{{url('admin/sub-categories-list')}}">Sub Categories</a></li> -->
										</ul>
									</li>

									<?php } ?>

                                    
									<?php if(((Auth::guard('admin')->user()->listing_types)=='Read&Write')||((Auth::guard('admin')->user()->listing_types)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<li class="{{request()->is('admin/add-listingtype')||request()->is('admin/edit-listingtype/*') ? 'active' : ''}}">
										<a href=""><img src="{{url('public/images/png/listing.png')}}" style="width: 26px;height: 26px;"> <span>Listing Types</span></a>
										<ul>
											<li class="{{request()->is('admin/listing-type') ? 'active' : ''}}"><a href="{{url('admin/listing-type')}}"><img src="{{url('public/images/png/type.png')}}" style="width: 26px;height: 26px;">Listing</a></li>
										</ul>
									</li>    

									<?php } ?>
									
									
									
									<?php if(((Auth::guard('admin')->user()->product_listing)=='Read&Write')||((Auth::guard('admin')->user()->product_listing)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<li class="{{request()->is('admin/every-list')|| request()->is('admin/add-list')|| request()->is('admin/edit-list/*')  ? 'active' : '' }}">
										<a href=""><img src="{{url('public/images/png/productlist.png')}}" style="width: 26px;height: 26px;"> <span>Listings</span></a>
										<ul>
											<li class="{{request()->is('admin/every-list') ? 'active' : ''}}"><a href="{{url('admin/every-list')}}"><img src="{{url('public/images/png/listproduct.png')}}" style="width: 26px;height: 26px;"> Listings</a></li>
										</ul>
									</li>    
                                    <?php }?>
									<!-- <li class="{{request()->is('admin/pending-list') ||  request()->is('admin/view-pending/*') ||  request()->is('admin/delivered-list') ||  request()->is('admin/view-delivered/*')  ? 'active' : ''}}">
										<a href="#"><i class="icon-file-text"></i> <span>Deliveries</span></a>
										<ul>
											<li class="{{request()->is('admin/pending-list') || request()->is('admin/view-pending/*') ? 'active' : ''}}"><a href="{{url('admin/pending-list')}}">Deliveries List</a></li>
										</ul>

										{{-- <ul>
											<li class="{{request()->is('admin/delivered-list') || request()->is('admin/view-delivered/*') ? 'active' : ''}}"><a href="{{url('admin/delivered-list')}}">Delivered</a></li>
										</ul> --}}
									</li> -->

									
									<?php if(((Auth::guard('admin')->user()->blogs)=='Read&Write')||((Auth::guard('admin')->user()->blogs)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<li class="{{request()->is('admin/blogs-list') || request()->is('admin/add-blog') || request()->is('admin/edit-blog/*') ? 'active' : ''}}">
									<a href="{{url('admin/blogs-list')}}"><img src="{{url('public/images/png/blog.png')}}" style="width: 26px;height: 26px;">  <span>Blogs</span></a>
									</li>
                                    <?php } ?>
									

									<?php if(((Auth::guard('admin')->user()->badges)=='Read&Write')||((Auth::guard('admin')->user()->badges)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

									<li class="{{request()->is('admin/badge-requests')  ? 'active' : '' }}"><a href="{{url('admin/badge-requests')}}"><img src="{{url('public/images/png/badges.png')}}" style="width: 26px;height: 26px;"> <span>Badges</span></a></li>
									
									<?php } ?>
									<!-- Subscription Plans -->
									<?php if(((Auth::guard('admin')->user()->subscription_plans)=='Read&Write')||((Auth::guard('admin')->user()->subscription_plans)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>

								<li class="{{request()->is('admin/subscription-plan-list') || request()->is('admin/edit-subscription-plan/*') ? 'active' : ''}}">
									<a href="{{url('admin/subscription-plan-list')}}"><img src="{{url('public/images/png/subscriptionplan.png')}}" style="width: 26px;height: 26px;"> <span>Subscription Plans</span></a>
								</li>
									<?php } ?>
								<!-- Subscriptions-->
								
								
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

									


			<?php if(((Auth::guard('admin')->user()->category)=='Read&Write')||((Auth::guard('admin')->user()->category)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin') { ?>

             <li class="{{request()->is('admin/users-report')||request()->is('admin/dashboard-newmonthly')||request()->is('admin/users-report')||request()->is('admin/revenue-report')||request()->is('admin/list-report')  ? 'active' : ''}}">

              <a href=""><img src="{{url('public/images/png/revenue.png')}}" style="width: 26px;height: 26px;"><span style="margin">Revenue</span></a>
	          <ul>
		
				<li class="{{request()->is('admin/users-report')||request()->is('admin/dashboard-newmonthly')|| request()->is('admin/dashboard-newyearly/*')  ? 'active' : ''}}"><a href="{{url('admin/users-report')}}"><img src="{{url('public/images/png/wallet.png')}}" style="width: 26px;height: 26px;">Wallet top up</a></li>
				<li class="{{request()->is('admin/revenue-report')||request()->is('admin/dashboard-rvenuemonthly')||request()->is('admin/dashboard-revenueyearly/*') ? 'active' : ''}}"><a href="{{url('admin/revenue-report')}}"><img src="{{url('public/images/png/subscribe.png')}}" style="width: 26px;height: 26px;">Subscriptions</a></li>
				<li class="{{request()->is('admin/list-report')|| request()->is('admin/dashboard-newlistmonthly')||request()->is('admin/dashboard-newlistyearly/*') ? 'active' : ''}}"><a href="{{url('admin/list-report')}}"><img src="{{url('public/images/png/list.png')}}" style="width: 26px;height: 26px;">Google Adsense</a></li>

		<!-- <li class="{{request()->is('admin/sub-categories-list') ? 'active' : ''}}"><a href="{{url('admin/sub-categories-list')}}">Sub Categories</a></li> -->
			</ul>
		</li>

<?php } ?>  




	  								<li class="{{request()->is('admin/update-profile')|| request()->is('admin/change-password')||request()->is('admin/logout')    ? 'active' : ''}}">
										<a href=""><img src="{{url('public/images/png/seting.png')}}" style="width: 26px;height: 26px;"><span>Setting</span></a>
										<ul>
											
											<li class="{{request()->is('admin/update-profile') ? 'active' : ''}}"><a href="{{url('admin/update-profile')}}"> Edit Profile</a></li>
										    <li class="{{request()->is('admin/change-password') ? 'active' : ''}}"><a href="{{url('admin/change-password')}}"> Change Password</a></li>
											<li class="{{request()->is('admin/logout') ? 'active' : ''}}"><a href="{{url('admin/logout'.'/'.Auth::guard('admin')->user()->id)}}">Logout</a></li>
																										
																										
										</ul>
									</li>    
								
                                  



									<?php if(((Auth::guard('admin')->user()->app_content)=='Read&Write')||((Auth::guard('admin')->user()->app_content)=='Read')||(Auth::guard('admin')->user()->adminrole)=='Superadmin' ){ ?>

								<!-- Contents -->
									<li class="{{request()->is('admin/about-us') || request()->is('admin/terms-and-conditions') || request()->is('admin/privacy-policy') ? 'active' : ''}}">
										<a href=""><img src="{{url('public/images/png/content.png')}}" style="width: 26px;height: 26px;"> <span>App Contents</span></a>
										<ul>
											<li class="{{request()->is('admin/about-us') ? 'active' : ''}}"><a href="{{url('admin/about-us')}}">About Us</a></li>
											<li class="{{request()->is('admin/terms-and-conditions') ? 'active' : ''}}"><a href="{{url('admin/terms-and-conditions')}}">Terms & Conditions</a></li>
											<li class="{{request()->is('admin/privacy-policy') ? 'active' : ''}}"><a href="{{url('admin/privacy-policy')}}">Privacy Policy</a></li>
											<li class="{{request()->is('admin/billing-policy') ? 'active' : ''}}"><a href="{{url('admin/billing-policy')}}">Billing Policy</a></li>
											<li class="{{request()->is('admin/refund-policy') ? 'active' : ''}}"><a href="{{url('admin/refund-policy')}}">Refund Policy</a></li>
											<li class="{{request()->is('admin/safetyTips') ? 'active' : ''}}"><a href="{{url('admin/safetyTips')}}">Safety</a></li>
											<li class="{{request()->is('admin/shipping') ? 'active' : ''}}"><a href="{{url('admin/shipping')}}">Shipping</a></li>
											<li class="{{request()->is('admin/buying') ? 'active' : ''}}"><a href="{{url('admin/buying')}}">Buying</a></li>
										</ul>
									</li>
									<?php } ?>
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