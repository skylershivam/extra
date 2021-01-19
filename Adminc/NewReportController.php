<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\everylist;
use App\wallet;
class NewReportController extends Controller
{
    
    
    
  public function datefilter(Request $request)
  {
      if($request->isMethod('post')){
        
          $date_to=$request->date_to;
          $date_from=$request->date_from;
          
          
          
        
          
          

        $revenue = DB::table('users')->sum('subcategory');
        
         
        $date = date( 'Y-m-d',strtotime('monday this week'));
        for($i=1;$i<=7;$i++){
          $dates[]=$date;
          $silver_graph[]= DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',2)->count();
          $total_gold_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',1)
          ->count();

          $total_blue_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',3)
          ->count();
          
          $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
        }
        $collection=collect($dates);
        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users= 
          DB::table('users')
        ->select('users.id','users.status','users.first_name', 'users.last_name','users.image'
        ,'users.email','subscription_plans.plan_name','users.subcategory','users.date_to','users.date_from')
        ->join('subscription_plans','users.plan_id','=','subscription_plans.id')
        ->orderBy('id','Desc')->whereBetween('date_to',['date_to'=> $date_to,'date_from'=> $date_from,])->get();
        
        $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');
        //dd($latest_events); 
        $format = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        
        $format = "'" . implode ( "', '", $format ) . "'";
        return view('admin.Report.revenue',compact('users','total_SubCategories','user_graph','format','latest_users','latest_business','total_business','total_categories','total_gold_graph','graph_date','total_listing','total_maincategories','revenue','silver_graph','total_blue_graph','date_to','date_from'));




          
        return view('admin.Report.revenue',compact('latest_users'));        
          
      }

      
  }

  
  
  
  
  
  public function reportUser(Request $request)
    {
        
        $users=DB::table('wallet')->sum('credit');
        $date = date( 'Y-m-d',strtotime('monday this week'));
        for($i=1;$i<=7;$i++){
          $dates[]=$date;
          $user_graph[]= DB::table('wallet')->whereDate('created_at', '=',$date)->count();
          $total_business_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('role',2)->count();
          $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
        }
        $collection=collect($dates);
        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=wallet::orderBy('id','Desc')->get();
        //dd($latest_events); 
        $format = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $format = "'" . implode ( "', '", $format ) . "'";
        return view('admin.Report.users',compact('users','user_graph','format','latest_users','graph_date'));
    }
       

    public function dashboardMonthly(Request $request)
    {
      // die('sdsd'); 
      $users=DB::table('wallet')->sum('credit');


      $first_day_this_month = date('Y-m-01');
      $number_of_days_this_month  = date('t');
      //dd($first_day_this_month);
        $date=$first_day_this_month; 
        for($i=1;$i<=$number_of_days_this_month;$i++){
            $dates[]=$date;
            $user_graph[]= DB::table('wallet')->whereDate('created_at', '=',$date)->count();
            
            $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
            $format[]=$i;
        }
        $collection=collect($dates);

        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=wallet::orderBy('id','Desc')->get();
        $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');
        // dd($format);
        $format = "'" . implode ( "', '", $format ) . "'";
       return view('admin.Report.users',compact('users','user_graph','format','latest_users','graph_date'));
    }

   
    
    public function reportListing(Request $request)
    {
        
       
        $users= DB::table('everylists')
        ->select('everylists.id','everylists.is_new','everylists.category', 'everylists.sub_cat_id','everylists.product_name'
        ,'everylists.sale_price','everylists.actual_price','everylists.discount_price','everylists.maincategory_id'
        ,'everylists.subcategory','everylists.quantity','everylists.description','everylists.gender','everylists.is_active' 
        ,'everylists.created_at','everylists.updated_at','everylists.image','maincategories.maincategoryname','everylists.Listing_type'
        ,'everylists.is_active')
        ->join('maincategories','everylists.maincategory_id','=','maincategories.id')
        ->count();
        $date = date( 'Y-m-d',strtotime('monday this week'));
        for($i=1;$i<=7;$i++){
          $dates[]=$date;
          $user_graph[]= DB::table('everylists')->whereDate('created_at', '=',$date)->count();
          $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
        }
        $collection=collect($dates);
        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=DB::table('everylists')
        ->select('everylists.id','everylists.is_new','everylists.category', 'everylists.sub_cat_id','everylists.product_name'
        ,'everylists.sale_price','everylists.actual_price','everylists.discount_price','everylists.maincategory_id'
        ,'everylists.subcategory','everylists.quantity','everylists.description','everylists.gender','everylists.is_active' 
        ,'everylists.created_at','everylists.updated_at','everylists.image','maincategories.maincategoryname','everylists.Listing_type'
        ,'everylists.is_active')
        ->join('maincategories','everylists.maincategory_id','=','maincategories.id')->orderBy('id','Desc')->get()->take('5');
        //dd($latest_events); 
        $format = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $format = "'" . implode ( "', '", $format ) . "'";
        return view('admin.Report.everylist',compact('users','user_graph','format','latest_users','graph_date'));
        
    }
    
    public function dashboardNewyearly(Request $request ,$year)
    {

      $users=DB::table('wallet')->sum('credit');
     

     
      
      $selected_year=explode('/',$request->url());

      for($i=1;$i<=12;$i++){
        $user_graph[]= DB::table('users')->whereMonth('created_at',$i)->whereYear('created_at',$year)->where('role',1)->count();
      }
      $graph_date=array('start_date'=>$year.'-'.'01-01','end_date'=>$year.'-'.'12-31');
      $latest_users=wallet::orderBy('id','Desc')->get();
      $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');

      $format = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec');
      $format = "'" . implode ( "', '", $format ) . "'";
      return view('admin.Report.users',compact('users','user_graph','format','latest_users','graph_date'));
    }

    
    
    public function dashboardlistMonthly(Request $request)
    {
      // die('sdsd'); 
      $users=everylist::count();
      

      $first_day_this_month = date('Y-m-01');
      $number_of_days_this_month  = date('t');
      //dd($first_day_this_month);
        $date=$first_day_this_month; 
        for($i=1;$i<=$number_of_days_this_month;$i++){
            $dates[]=$date;
            $user_graph[]= DB::table('everylists')->whereDate('created_at', '=',$date)->count();
            
            $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
            $format[]=$i;
        }
        $collection=collect($dates);

        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=DB::table('everylists')
        ->select('everylists.id','everylists.is_new','everylists.category', 'everylists.sub_cat_id','everylists.product_name'
        ,'everylists.sale_price','everylists.actual_price','everylists.discount_price','everylists.maincategory_id'
        ,'everylists.subcategory','everylists.quantity','everylists.description','everylists.gender','everylists.is_active' 
        ,'everylists.created_at','everylists.updated_at','everylists.image','maincategories.maincategoryname','everylists.Listing_type'
        ,'everylists.is_active')
        ->join('maincategories','everylists.maincategory_id','=','maincategories.id')->orderBy('id','Desc')->get()->take('5');
        // dd($format);
        $format = "'" . implode ( "', '", $format ) . "'";
       return view('admin.Report.everylist',compact('users','user_graph','format','latest_users','graph_date'));
    }
     
    public function dashboardlistYearly(Request $request ,$year)
    {
      
      $users=everylist::count();
      
      
      $selected_year=explode('/',$request->url());

      for($i=1;$i<=12;$i++){
        $user_graph[]= DB::table('everylists')->whereMonth('created_at',$i)->whereYear('created_at',$year)->count();
      }
      $graph_date=array('start_date'=>$year.'-'.'01-01','end_date'=>$year.'-'.'12-31');
      $latest_users=DB::table('everylists')
      ->select('everylists.id','everylists.is_new','everylists.category', 'everylists.sub_cat_id','everylists.product_name'
      ,'everylists.sale_price','everylists.actual_price','everylists.discount_price','everylists.maincategory_id'
      ,'everylists.subcategory','everylists.quantity','everylists.description','everylists.gender','everylists.is_active' 
      ,'everylists.created_at','everylists.updated_at','everylists.image','maincategories.maincategoryname','everylists.Listing_type'
      ,'everylists.is_active')
      ->join('maincategories','everylists.maincategory_id','=','maincategories.id')->orderBy('id','Desc')->get()->take('5');

      $format = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec');
      $format = "'" . implode ( "', '", $format ) . "'";
      return view('admin.Report.everylist',compact('users','user_graph','format','latest_users','graph_date'));
    }
    
    public function revenueStatus(Request $request)
    {
       
        $revenue = DB::table('users')->sum('subcategory');
        
         
        $date = date( 'Y-m-d',strtotime('monday this week'));
        for($i=1;$i<=7;$i++){
          $dates[]=$date;
          $silver_graph[]= DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',2)->count();
          $total_gold_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',1)
          ->count();

          $total_blue_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',3)
          ->count();
          
          $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
        }
        $collection=collect($dates);
        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=DB::table('users')
       ->select('users.id','users.status','users.first_name', 'users.last_name','users.image'
       ,'users.email','subscription_plans.plan_name','users.subcategory','users.date_to','users.date_from')
       ->join('subscription_plans','users.plan_id','=','subscription_plans.id')
       ->orderBy('id','Desc')->where(['is_deleted'=>1,'role'=>1])->get();
        
        $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');
        //dd($latest_events); 
        $format = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        
        $format = "'" . implode ( "', '", $format ) . "'";
        return view('admin.Report.revenue',compact('users','total_SubCategories','user_graph','format','latest_users','latest_business','total_business','total_categories','total_gold_graph','graph_date','total_listing','total_maincategories','revenue','silver_graph','total_blue_graph'));
    }

    
    public function dashboardrevenueMonthly(Request $request)
    {
      // die('sdsd'); 
      $revenue=DB::table('users')->sum('subcategory');
      

      $first_day_this_month = date('Y-m-01');
      $number_of_days_this_month  = date('t');
      //dd($first_day_this_month);
        $date=$first_day_this_month; 
        for($i=1;$i<=$number_of_days_this_month;$i++){
            $dates[]=$date;
            $user_graph[]= DB::table('users')->whereDate('created_at', '=',$date)->where('role',1)->count();
            $total_blue_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',3)
          ->count();
            
            $silver_graph[]= DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',2)->count();

            $total_gold_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('plan_id',1)
          ->count();
            $total_business_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('role',2)->count();
            $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
            $format[]=$i;
        }
        $collection=collect($dates);

        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=DB::table('users')
        ->select('users.id','users.status','users.first_name', 'users.last_name','users.image'
        ,'users.email','subscription_plans.plan_name','users.subcategory','users.date_to','users.date_from')
        ->join('subscription_plans','users.plan_id','=','subscription_plans.id')
        ->orderBy('id','Desc')->where(['is_deleted'=>1,'role'=>1])->get();
        $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');
        // dd($format);
        $format = "'" . implode ( "', '", $format ) . "'";
       return view('admin.Report.revenue',compact('users','user_graph','format','latest_users','graph_date','revenue','total_gold_graph','silver_graph','total_blue_graph'));
    }


    public function dashboardrevenueYearly(Request $request ,$year)
    {
      
      $revenue=DB::table('users')->sum('subcategory');

      
      $selected_year=explode('/',$request->url());

      for($i=1;$i<=12;$i++){
        
        $user_graph[]= DB::table('users')->whereMonth('created_at',$i)->whereYear('created_at',$year)->count();
        $total_blue_graph[] =  DB::table('users')->whereDate('created_at', '=',$year)->where('plan_id',3)
        ->count();
          
          $silver_graph[]= DB::table('users')->whereDate('created_at', '=',$year)->where('plan_id',2)->count();

          $total_gold_graph[] =  DB::table('users')->whereDate('created_at', '=',$year)->where('plan_id',1)
        ->count();


      }
      $graph_date=array('start_date'=>$year.'-'.'01-01','end_date'=>$year.'-'.'12-31');
      $latest_users=DB::table('users')
      ->select('users.id','users.status','users.first_name', 'users.last_name','users.image'
      ,'users.email','subscription_plans.plan_name','users.subcategory','users.date_to','users.date_from')
      ->join('subscription_plans','users.plan_id','=','subscription_plans.id')
      ->orderBy('id','Desc')->where(['is_deleted'=>1,'role'=>1])->get();

      $format = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec');
      $format = "'" . implode ( "', '", $format ) . "'";
      return view('admin.Report.revenue',compact('revenue','user_graph','format','latest_users','graph_date','total_blue_graph','silver_graph','total_gold_graph'));
    }


}
