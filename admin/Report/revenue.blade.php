

@extends('admin.layout.master2')
@section('title', 'Revnue')
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
      <center>
         <div class="alert alert-info msg">{{ Session::get('message') }}</div>
      </center>
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
            <h5 class="panel-title">Revenue</h5>
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
         </div>
         <div class="panel-body">
            <!-- Default select -->
            <div class="form-group ">
               <label>Default select</label>
               <select class="bootstrap-select"  id="ddlFruits">
                  <option value="weekly">Weekly</option>
                  <option value="monthly" {{request()->is('admin/dashboard-rvenuemonthly') ? 'selected' : ''}} >Monthly</option>
                  <option value="yearly" {{request()->is('admin/dashboard-yearly/*') ? 'selected' : ''}} >Yearly</option>
               </select>
               <label>Select Year</label>
               <select class="bootstrap-select yearselect"  id="selectyear"></select>
            </div>
            <!-- /default select -->
            <div class="chart-container">
               <div class="chart has-fixed-height" id="basic_area"></div>
            </div>
            <div class="row">
               <p style="text-align:center;margin-top:30px;font-weight:bold;">({{$graph_date['start_date']}} - {{$graph_date['end_date']}})</p>
               <!-- /bacis pie chart -->     
               <div class="col-lg-12">
                  <div class="card">
                     <div class="bg-light p-20" style="margin-top: 75px;">
                        <div class="d-flex">
                           <div class="align-self-center">
                              <h3 class="m-b-0">Revenue Users</h3>
                              <small></small>
                           </div>
                           <div class="ml-auto align-self-center">
                              <h2 class="text-success"></h2>
                           </div>
                        </div>
                     </div>
                     <form action="{{url('admin/date')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <div class="panel panel-flat">
                           <div class="panel-body">
                              <div class="form-group">
                                 <label class="col-lg-3 control-label">date From:</label>
                                 <div class="col-lg-9">
                                    <?php  if (isset($date_to)){  ?>
                                    <input type="date"  name="date_from"  class="form-control" value="{{$date_from}}"  >
                                    <?php }else{ ?>
                                    <input type="date"  name="date_from"  class="form-control" >
                                    <?php } ?>
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $errors->first('date_to') }}</strong>
                                    </span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-lg-3 control-label">date to:</label>
                                 <div class="col-lg-9">
                                    <?php  if (isset($date_to)){  ?>
                                    <input type="date"  name="date_to"  class="form-control" value="{{$date_to}}" >
                                    <?php }else{ ?>
                                    <input type="date"  name="date_to"  class="form-control" >
                                    <?php } ?>
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $errors->first('date_to') }}</strong>
                                    </span>
                                 </div>
                              </div>
                              @csrf
                              <div class="text-right">
                                 <button type="submit" class="btn btn-primary">Data Filter<i class="icon-arrow-right14 position-right"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table datatable-basic" id="order_table">
                              <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Plan</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date To</th>
                                    <th>Date From</th>
                                    <?php if(((Auth::guard('admin')->user()->users_managment)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){
                                       ?>	
                                    <th class="text-center">Actions</th>
                                    <?php } ?>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php($i=1)
                                 @foreach($latest_users as $latest_user)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$latest_user->first_name}}</td>
                                    <td>{{$latest_user->last_name}}</td>
                                    <td>{{$latest_user->email}}</td>
                                    <td><img src="{{ URL::to('/') }}/public/images/{{ $latest_user->image}}" class="img-thumbnail" width="75" /></td>
                                    <td>{{$latest_user->plan_name}}</td>
                                    <td>{{$latest_user->subcategory}}</td>
                                    <td><a href="{{url('admin/active-inactive'.'/'.$latest_user->id)}}">@if($latest_user->status==1) <span class="label label-success"> Verified @else <span class="label label-default"> Not Verified @endif</span></a></td>
                                    <td>{{$latest_user->date_to}}</td>
                                    <td>{{$latest_user->date_from}}</td>
                                    <?php if(((Auth::guard('admin')->user()->users_managment)=='Read&Write')||(Auth::guard('admin')->user()->adminrole)=='Superadmin'){ ?>
                                    <td class="text-center">
                                       <ul class="icons-list">
                                          <li class="dropdown">
                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                             <i class="icon-menu9"></i>
                                             </a>
                                             <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{url('admin/edit-user'.'/'.$latest_user->id)}}"><i class="icon-pencil5"></i> Edit User</a></li>
                                                <li><a href="{{url('admin/view-user'.'/'.$latest_user->id)}}"><i class="icon-eye"></i> View User</a></li>
                                                <li><a href="{{url('admin/delete-user'.'/'.$latest_user->id)}}"><i class="icon-folder-remove"></i>Delete User</a></li>
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
                  </div>
               </div>
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
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_basic.js')}}"></script>



<!-- Theme JS files -->
<script type="text/javascript" src="{{url('public/admin/assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin/assets/js/plugins/visualization/echarts/echarts.js')}}"></script>   
<script type="text/javascript" src="{{url('public/admin/assets/js/pages/form_bootstrap_select.js')}}"></script>






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
         	window.location.href = "{{url('admin/dashboard-rvenuemonthly')}}";
     	}else if(selectedValue == 'yearly'){
             var selectedValue = '2019'
             window.location.href = "{{url('admin/dashboard-revenueyearly/')}}"+'/'+selectedValue;    
         }else{ 
             window.location.href = "{{url('admin/revenue-report')}}";
         }
   
         
     });
</script>
<script type="text/javascript">
   $("#selectyear").change(function () {
         var selectedValue = $(this).val();
         window.location.href = "{{url('admin/dashboard-revenueyearly/')}}"+'/'+selectedValue;
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
                      x3: 10,
                      y: 35,
                      y2: 25,
                      y3: 15,
                      
                  },
                  // Add tooltip
                  tooltip: {
                      trigger: 'axis'
                  },
                  // Add legend
                  legend: {
                      data: ['Gold', 'Silver','Blue']
                      
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
                      {
                          name: 'Gold',
                          type: 'line',
                          smooth: true,
                          itemStyle: {normal: {areaStyle: {type: 'default'}}},
                          data: [<?php echo implode (", ", $total_gold_graph); ?>]
                      },
                     
                      {
                          name: 'Silver',
                          type: 'line',
                          smooth: true,
                          itemStyle: {normal: {areaStyle: {type: 'default'}}},
                          data: [<?php echo implode (", ", $silver_graph); ?>]
                      },
   
                      {
                          name: 'blue',
                          type: 'line',
                          smooth: true,
                          itemStyle: {normal: {areaStyle: {type: 'default'}}},
                          data: [<?php echo implode (", ", $total_blue_graph); ?>]
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
<script>
   $(document).ready(function(){
    $('.input-daterange').datepicker({
     todayBtn:'linked',
     format:'yyyy-mm-dd',
     autoclose:true
    });
   
    load_data();
   
    function load_data(from_date = '', to_date = '')
    {
     $('#order_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
       url:'{{ route("daterange.index") }}',
       data:{from_date:from_date, to_date:to_date}
      },
      columns: [
       {
        data:'order_id',
        name:'order_id'
       },
       {
        data:'order_customer_name',
        name:'order_customer_name'
       },
       {
        data:'order_item',
        name:'order_item'
       },
       {
        data:'order_value',
        name:'order_value'
       },
       {
        data:'order_date',
        name:'order_date'
       }
      ]
     });
    }
   
    $('#filter').click(function(){
     var from_date = $('#from_date').val();
     var to_date = $('#to_date').val();
     if(from_date != '' &&  to_date != '')
     {
      $('#order_table').DataTable().destroy();
      load_data(from_date, to_date);
     }
     else
     {
      alert('Both Date is required');
     }
    });
   
    $('#refresh').click(function(){
     $('#from_date').val('');
     $('#to_date').val('');
     $('#order_table').DataTable().destroy();
     load_data();
    });
   
   });
</script>
@endsection

