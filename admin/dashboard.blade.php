@extends('admin.layout.master2')
@section('title', 'Dashboard')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ul>
		</div>
		@if (Session::has('message'))
			<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
		@endif
	</div>
	<!-- /page header -->
<style type="text/css">
.desh_brd .panel-body h3.no-margin {
    font-size: 31px;
    background: rgba(0,0,0,0.6);
    display: inline-block;
    padding: 0px 19px;
    border-radius: 6px;
    margin-bottom: 10px !important;
    
}
.desh_brd .panel-body h3.no-margin a{
	color:#fff;
	}
.desh_brd .panel-body {
    z-index: 4;
    font-size: 24px;
}
.desh_brd {
    position: relative;
}
.desh_brd:after {
    content: "";
    position: absolute;
    height: 100%;
    width: 100%;
    background: rgba(0,0,0,0.7);
    left: 0;
    top: 0;
    z-index: 0;
}
.desh_brd p{
	float: left;width: 100%;
	font-size: 13px;
}
.desh_brd i {
    font-size: 40px;
    margin-bottom: 10px;
}

</style>
	<!-- Content area -->
	<div class="content">
		<!-- Basic area chart -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Dashboard</h5>
	
				<div class="col-lg-3" >

					<!-- Members online -->
					
					<div class="panel bg-teal-400 desh_brd" style="background:url({{url('/public/images/users.png')}}) ;">
						<div class="panel-body pnl">
							<div id="today-revenue"><i class="icon-user"></i></div>
							<h3 class="no-margin"> {{$users}} </h3>
							<p>Total Users</p>
						   
						</div>

						
					</div>
					</a>
					<!-- /members online -->

				</div>

				

                
           

				
				<div class="col-lg-6">

				
                    <div class="panel bg-blue-400 desh_brd" style="background:url({{url('/public/images/past-challenges.png')}}) ;">
                      <div class="panel-body">
                        <div style="float:left;width:25%;">
                        <a class="no-margin" style="color:white;" href="{{url('admin/add-users')}}">
                            <i class="icon-cube3"></i>
                            <p>{{@$total_categories}}</p>
                            <p>Total<br>Listing<br>Categories</p></a>
                            
                        </div>
                        
                        

                        <div style="float:left;width:25%;" >
                        <a class="no-margin" style="color:white;" href="{{url('admin/listing-type')}}">
                            <i class="icon-cube3"></i>
                            <p>{{@$total_listing}}</p>
                            <p>Total<br>Listing</p></a>   
                       </div>
                        
                       <div style="float:left;width:25%;" >
                        <a class="no-margin" style="color:white;" href="{{url('admin/maincategories-list')}}">
                            <i class="icon-cube3"></i>
                            <p>{{@$total_SubCategories}}</p>
                            <p>Total<br>SubCategories</p></a>   
                       </div>
                        
                       
                       

                    </div>
                    
                    
					

				</div>

                
                
                
                            






			</div>
            <div class="col-lg-3" >

                    <!-- Members online -->
                    <a href="{{url('admin/every-list')}}" >
                    <div class="panel bg-teal-400 desh_brd" style="background:url({{url('/public/images/profit.jpg')}}) ;">
                        <div class="panel-body pnl">
                            <div id=""><i class="icon-coin-pound"></i></div>
                            <h3 class="no-margin">&#163;{{@$revenue}}</h3>
                            <p>Total Revenue</p>
                        
                        </div>

                        
                    </div>
                    </a>
                    <!-- /members online -->

                    </div>

              



			<div class="panel-body">
                <!-- Default select -->
				<div class="form-group ">
					<label>Default select</label>
					<select class="bootstrap-select"  id="ddlFruits">
						<option value="weekly">Weekly</option>
						<option value="monthly" {{request()->is('admin/dashboard-monthly') ? 'selected' : ''}} >Monthly</option>
                        <option value="yearly" {{request()->is('admin/dashboard-yearly/*') ? 'selected' : ''}} >Yearly</option>
					</select>

					<label>Select Year</label>
					<select class="bootstrap-select yearselect"  placeholder="Please Select Year" id="selectyear"></select>
				</div>
          				<!-- /default select -->
				<div class="chart-container">
                        
					<div class="chart has-fixed-height" id="basic_area"></div>

				</div>
				<div class="row">
                <p style="text-align:center;margin-top:30px;font-weight:bold;">({{$graph_date['start_date']}} - {{$graph_date['end_date']}})</p> 
                <!-- /bacis pie chart -->     
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="bg-light p-20">
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h3 class="m-b-0">Latest Users</h3><small></small></div>
                                    <div class="ml-auto align-self-center">
                                        <h2 class="text-success"></h2></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover earning-box">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <!-- <th>Earnings</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($latest_users as $latest_user)
                                        <tr>
                                            <td>{{$latest_user->full_name}}</td>
                                            <td>
                                            <image src="@if($latest_user->image) {{ URL::to('/') }}/public/images/{{ $latest_user->image}} @else {{url('public/images/dummy-pic.png')}} @endif" height="35px" witdh="35px" class="img-circle img-md"></image>
                                            </td>
                                            <td>{{$latest_user->email}}</td>
                                            <td>
                                            	<a href="{{url('admin/active-inactive2'.'/'.$latest_user->id)}}"> @if($latest_user->status==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6">
                        <div class="card">
                            <div class="bg-light p-20">
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h3 class="m-b-0">Latest Business</h3><small></small></div>
                                    <div class="ml-auto align-self-center">
                                        <h2 class="text-success"></h2></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover earning-box">
                                        <thead>
                                            <tr>
                                                <th>Business Name</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($latest_business as $latest_busines)
                                       <tr>
                                            <td>{{$latest_busines->business_name}}</td>
                                            <td>
                                                <image src="@if($latest_busines->image) {{url('public/'.$latest_busines->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" height="35px" witdh="35px" class="img-circle img-md"></image>
                                            </td>
                                            <td>
                                                {{$latest_busines->email}}
                                            </td>
                                             <td>
                                                <a href="{{url('admin/active-inactive'.'/'.$latest_busines->id)}}"> @if($latest_user->status==1) <span class="label label-success"> Active @else <span class="label label-default"> Inactive @endif</span></a>
                                            </td>
                                             
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
			</div>
		</div>
		<!-- /basic area chart -->
		<!-- Footer -->
		@include('admin.layout.footer') 
		<!-- /footer -->
	</div>
	<!-- /content area -->
</div>
<!-- /main content -->
<!-- Theme JS files -->
<script type="text/javascript" src="{{url('public/admin/assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin/assets/js/plugins/visualization/echarts/echarts.js')}}"></script>   

<script type="text/javascript" src="{{url('public/admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin/assets/js/pages/form_bootstrap_select.js')}}"></script>
<!-- <script type="text/javascript" src="{{url('public/admin/assets/js/charts/echarts/lines_areas.js')}}"></script> -->
<!-- /theme JS files -->
<script src="{{url('public/admin/yearselect/year-select.js')}}"></script>


 <script type="text/javascript">
 $('.yearselect').yearselect();
 </script>

 <script type="text/javascript">
 	$("#ddlFruits").change(function () {
        var selectedValue = $(this).val();
       // alert(selectedValue);
        if(selectedValue == 'monthly'){
        	window.location.href = "{{url('admin/dashboard-monthly')}}";
    	}else if(selectedValue == 'yearly'){
            var selectedValue = '2019'
            window.location.href = "{{url('admin/dashboard-yearly/')}}"+'/'+selectedValue;    
        }else{ 
            window.location.href = "{{url('admin/dashboard')}}";
        }

        
    });
 </script>


 <script type="text/javascript">
 	$("#selectyear").change(function () {
        var selectedValue = $(this).val();
        window.location.href = "{{url('admin/dashboard-yearly/')}}"+'/'+selectedValue;
    });
 </script>
<script type="text/javascript">
	$(function() {
    // ------------------------------
    require.config({
        paths: {
            echarts: '{{url('/')}}/public/admin/assets/js/plugins/visualization/echarts'
        }
    });
    // Configuration
    // ------------------------------
    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/bar',
            'echarts/chart/line'
        ],
        // Charts setup
        function (ec, limitless) {
            var basic_area = ec.init(document.getElementById('basic_area'), limitless);
            //
            // Basic area options
            //
            basic_area_options = {
                // Setup grid
                grid: {
                    x: 40,
                    x2: 20,
                    y: 35,
                    y2: 25
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis'
                },
                // Add legend
                legend: {
                    // data: ['Users', 'Business']
                    data: ['Users']
                },
                // Enable drag recalculate
                calculable: true,
               // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: [
                        <?php echo  $format; ?>
                    ]
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value'
                }],
                // Add series
                series: [
                    // {
                    //     name: 'Business',
                    //     type: 'line',
                    //     smooth: true,
                    //     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                    //     data: [<?php echo implode (", ", $total_business_graph); ?>]
                    // },
                   
                    {
                        name: 'Users',
                        type: 'line',
                        smooth: true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: [<?php echo implode (", ", $user_graph); ?>]
                    }
                ]
            };
            basic_area.setOption(basic_area_options);
           window.onresize = function () {
                setTimeout(function () {
                    basic_area.resize();
                }, 200);
            }
        }
    );
});

</script>
<script type="text/javascript">

$(function () {
    // Set paths
    // ------------------------------
    require.config({
        paths: {
           echarts: '{{url('/')}}/public/admin/assets/js/plugins/visualization/echarts'
        }
    });
    // Configuration
    // ------------------------------
    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/pie',
            'echarts/chart/funnel'
        ],
        // Charts setup
        function (ec, limitless) {
            // Initialize charts
            // ------------------------------
            var basic_pie = ec.init(document.getElementById('basic_pie'), limitless);
            // Charts setup
            // ------------------------------                    

            //
            // Basic pie options
            //

            basic_pie_options = {

                // Add title
                title: {
                    text: 'Interests',
                    subtext: 'Event Interests information',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['Dance', 'Sport events', 'Day Party', 'Festival', 'Clubbing']
                },

                // Display toolbox
                toolbox: {
                    show: false,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,
 
                // Add series
                series: [{
                    name: 'Interests',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '57.5%'],
                    data: [
                        {value: 335, name: 'Dance'},
                        {value: 310, name: 'Sport events'},
                        {value: 234, name: 'Day Party'},
                        {value: 135, name: 'Festival'},
                        {value: 1548, name: 'Clubbing'}
                    ]
                }]
            };
            // Apply options
            // ------------------------------
            basic_pie.setOption(basic_pie_options);
            // Resize charts
            // ------------------------------
            window.onresize = function () {
                setTimeout(function (){
                    basic_pie.resize();
                   
                }, 200);
            }
        }
    );
});


</script>

<script type="text/javascript">

$(function () {
    // Set paths
    // ------------------------------
    require.config({
        paths: {
            echarts: '{{url('/')}}/public/admin/assets/js/plugins/visualization/echarts'
        }
    });
    // Configuration
    // ------------------------------
    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/pie',
            'echarts/chart/funnel'
        ],
        // Charts setup
        function (ec, limitless) {
            // Initialize charts
            // ------------------------------
            var basic_pie = ec.init(document.getElementById('basic_pie2'), limitless);
            // Charts setup
            // ------------------------------                    

            //
            // Basic pie options
            //

            basic_pie_options = {

                // Add title
                title: {
                    text: 'Events',
                    subtext: 'Top 5 Most Events Areas',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['Norway', 'Sweden', 'Finland', 'Denmark', 'Netherlands']
                },

                // Display toolbox
                toolbox: {
                    show: false,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,
  
                // Add series
                series: [{
                    name: 'Events',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '57.5%'],
                    data: [
                        {value: 335, name: 'Norway'},
                        {value: 310, name: 'Sweden'},
                        {value: 234, name: 'Finland'},
                        {value: 135, name: 'Denmark'},
                        {value: 1548, name: 'Netherlands'}
                    ]
                }]
            };
            // Apply options
            // ------------------------------
            basic_pie.setOption(basic_pie_options);
            // Resize charts
            // ------------------------------
            window.onresize = function () {
                setTimeout(function (){
                    basic_pie.resize();
                   
                }, 200);
            }
        }
    );
});


</script>


@endsection