<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/fav.png')}}">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->  

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/dashboard.js')}}"></script>
	<!-- /theme JS files -->
    <style type="text/css">
	.navbar-brand > img {
    margin-top: 2px;
    height: 27px;
	}
</style>
</head>
<body class="login-container">
 @yield('content')

 <script type="text/javascript">
		$(".msg").show().delay(2000).fadeOut();
	</script>
</body>
 </html>
