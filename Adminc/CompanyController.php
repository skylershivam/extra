<?php

namespace App\Http\Controllers\Delivery_company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Forum;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
use App\Admin;
use App\Category;
use Carbon\Carbon;
use DB;
class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }	
 
    public function dashboardCompany(Request $request)
    {
        $users=User::where('role',1)->count();
        $total_business = User::where('role',2)->count();
        
        //echo $total_business;die();
        //die('hello');
        $total_categories = Category::count();
        $date = date( 'Y-m-d',strtotime('monday this week'));
        for($i=1;$i<=7;$i++){
          $dates[]=$date;
          $user_graph[]= DB::table('users')->whereDate('created_at', '=',$date)->where('role',1)->count();
          $total_business_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('role',2)->count();
          $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
        }
        $collection=collect($dates);
        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=User::orderBy('id','Desc')->where('role',1)->get()->take('5');
        $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');
        //dd($latest_events); 
        $format = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $format = "'" . implode ( "', '", $format ) . "'";

        return view('delivery_company.dashboard-company',compact('users','user_graph','format','latest_users','latest_business','total_business','total_categories','total_business_graph','graph_date'));
    }

    public function dashboardMonthly(Request $request)
    {
      // die('sdsd'); 
      $users=User::where('role',1)->count();
      $total_business = User::where('role',2)->count();
      $total_categories = Category::count();
      
      $first_day_this_month = date('Y-m-01');
      $number_of_days_this_month  = date('t');
      //dd($first_day_this_month);
        $date=$first_day_this_month; 
        for($i=1;$i<=$number_of_days_this_month;$i++){
            $dates[]=$date;
            $user_graph[]= DB::table('users')->whereDate('created_at', '=',$date)->where('role',1)->count();
            $total_business_graph[] =  DB::table('users')->whereDate('created_at', '=',$date)->where('role',2)->count();
            $date =   date('Y-m-d', strtotime('+1 day',strtotime($date)));
            $format[]=$i;
        }
        $collection=collect($dates);

        $graph_date=array('start_date'=>$collection->first(),'end_date'=>$collection->last());
        $latest_users=User::orderBy('id','Desc')->where('role',1)->get()->take('5');
        $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');
        // dd($format);
        $format = "'" . implode ( "', '", $format ) . "'";
       return view('admin.dashboard',compact('users','user_graph','format','latest_users','latest_business','total_business','total_categories','total_business_graph','graph_date'));
    }

    

     public function dashboardYearly(Request $request ,$year)
    {
      
      $users=User::where('role',1)->count();
      $total_business = User::where('role',2)->count();
      $total_categories = Category::count();
      $selected_year=explode('/',$request->url());

      for($i=1;$i<=12;$i++){
        $user_graph[]= DB::table('users')->whereMonth('created_at',$i)->whereYear('created_at',$year)->where('role',1)->count();
        $total_business_graph[] =  DB::table('users')->whereMonth('created_at',$i)->whereYear('created_at',$year)->where('role',2)->count();
      }
      $graph_date=array('start_date'=>$year.'-'.'01-01','end_date'=>$year.'-'.'12-31');
      $latest_users=User::orderBy('id','Desc')->where('role',1)->get()->take('5');
      $latest_business=User::orderBy('id','Desc')->where('role',2)->get()->take('5');

      $format = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec');
      $format = "'" . implode ( "', '", $format ) . "'";
      return view('admin.dashboard',compact('users','user_graph','format','latest_users','latest_business','total_business','total_categories','total_business_graph','graph_date'));
    }

   
    public function changePassword(Request $request)
    {
       $admin_id=Auth::guard('admin')->user()->id;
       $password=Auth::guard('admin')->user()->password;
      // dd($password);
      if($request->isMethod('post')){
       //   dd($request->all());
        $messages = [
            'old_password.required' => 'Please enter a old password.',
            'password.required' => 'Please enter a new password.',
            'confirm_password.required' => 'Please enter a confirm password.',
        ];    
         
        $validator = Validator::make($request->all(), [
            'old_password'=>'required',
            'password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:password',
        ],$messages );
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         
        if(!Hash::check($request->old_password, $password)) {
            return redirect()->back()->with('old_pwd','Incorrect old password')->withInput();
        }
          $password      =  Hash::make($request->password);
          $user= Admin::where('id',$admin_id)->update(['password'=>$password]);
            if($user){
                return redirect('admin/dashboard')->with('message','Password has been updated successfully.');
            }
        } 
        return view('admin.change-password');
    }

     public function updateImage(Request $request)
    {
        $admin_id=Auth::guard('admin')->user()->id;
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'image'=>'mimes:jpeg,jpg,png,gif',
                'email'=>'required',
            ];
            
            $messages = [
                'image.required' => 'Please select image.',
                'email.required' => 'Please enter email.',
            ];    
            $data = $request->validate($rules, $messages);
            if($request->file('image')){
                $path = Storage::putFile('public/user_images', $request->file('image'));
                $update_user['image'] = Storage::url($path);
            }

            $update_user['email'] = $request->email;

            $user= Admin::where('id',$admin_id)->update($update_user);
            if($user){
                return redirect('admin/dashboard')->with('message','Profile updated successfully.');
            }
        }
        $admin=Admin::where(['id'=>$admin_id])->first();
        return view('admin.update-image',compact('admin'));
    }

}
