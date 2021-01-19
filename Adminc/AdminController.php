<?php

namespace App\Http\Controllers\Admin;


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
use App\Listingtype;
use App\Category;
use App\Permission;
use App\MainCategories;
use App\Adminwarning;
use App\everylist;

use Spatie\Permission\Models\Role;

use DB;
class AdminController extends Controller
{
    
    
    
    
    
    public function __construct()
    {
        $this->middleware('admin');
    }	
 
    
    public function adminsList(Request $request)
    {
       $users=Admin::orderBy('id','Desc')->get();
       $id=Auth::guard('admin')->user()->id;
      
       
       return view('admin.Adminlists.adminlist',compact(['users']));
    }
    
    
    
    
   
    public function  editAdmin(Request $request ,$id=0)
    {
       
      
      if($request->isMethod('Post')){
        
        
       if($request->file('image')){ 
            $image = $request->file('image');
            $new_name = rand().'.'.$image->
            getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $update_user['image'] = $new_name;    
            $products= Admin::where('id',$id)->update($update_user); 
        }
            $update_user['name'] = $request->name;  
            $update_user['email'] = $request->email;
            
           
            
            $update_user['users_managment'] = $request->users_managment;
            $update_user['category']= $request->category;
            $update_user['listing_types']= $request->listing_types; 
            $update_user['product_listing']= $request->product_listing;
            $update_user['blogs']= $request->blogs;
            $update_user['badges']= $request->badges;
            $update_user['subscription_plans']= $request->subscription_plans;
            $update_user['subscriptions']= $request->subscriptions;
            $update_user['app_content'] = $request->app_content;
             
           
            $update_user['adminrole'] = $request->adminrole;  
               
           
           
            $products= Admin::where('id',$id)->update($update_user);
            
             return redirect('admin/admins-list')->with('message','Admin updated successfully.');
            
        }
       
        $roles=Role::get();
        $permissions = Permission::get();
        $admins=Admin::where(['id'=>$id])->first();
        return view('admin.Adminlists.edit',compact(['admins','permissions','roles']));
    }



    
    
  
       
    
    
    
    
        public function adminsAdd()
    {
        $permissions = Permission::get();
        $roles=Role::get();
        return view('admin.Adminlists.add',compact(['permissions','roles']));
    }
    
    public function deleteAdmin(Request $request ,$id=0)
    {
       
        $products=Admin::where(['id'=>$id])->delete();
        return \Redirect::back();
    }     
    
    public function storeAdmin(Request $request)
    {
        
        $check=Admin::where('email','=',$request->email)->get();
        
        
        
        
        
        
        if(count($check)>0)             
           {
           
            return redirect('admin/add-admin')->with('message','Email Already registered.');
           }else{
        
            
                        
       
                 if($request->file('image'))
                        { 
                            $image = $request->file('image');
                            $new_name = rand().'.'.$image->
                            getClientOriginalExtension();
                            $image->move(public_path('images'), $new_name);
                            }
                            $save['name'] = $request->name; 
                            
                            
                            $save['email'] = $request->email;  
                            $save['password'] =Hash::make($request->password);
                            if($request->file('image')){ 
                            $save['image'] =$new_name;
                            }
                            $save['users_managment'] = $request->users_managment; 
                            $save['category'] = $request->category;  
                            $save['listing_types'] = $request->listing_types; 
                            $save['product_listing'] = $request->product_listing;  
                            $save['blogs'] = $request->blogs; 
                            $save['badges']= $request->badges;
                            $save['subscription_plans'] = $request->subscription_plans;
                            $save['subscriptions']= $request->subscriptions;
                            $save['app_content'] = $request->app_content; 
                            $save['adminrole'] = $request->adminrole;  
                            
                    $user= Admin::insert($save);
                    return redirect('admin/admins-list')->with('message','Admin registered Sucessfully'); 
                    
                        
                    }
                
                    
                }            
    public function dashboard(Request $request)
    {
        
        $users=User::where('role',1)->count();
        $total_business = User::where('role',2)->count();
        
        //echo $total_business;die();
        //die('hello');
        $total_categories = Category::count();
        $total_maincategories =MainCategories::count();
        $total_listing = Listingtype::count();
        $revenue = DB::table('users')->sum('subcategory');
        $total_SubCategories=DB::table('newsub_categories')->count(DB::raw('DISTINCT name'));
         
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
        return view('admin.dashboard',compact('users','total_SubCategories','user_graph','format','latest_users','latest_business','total_business','total_categories','total_business_graph','graph_date','total_listing','total_maincategories','revenue'));
    }

    public function dashboardMonthly(Request $request)
    {
      // die('sdsd'); 
      $users=User::where('role',1)->count();
      $total_business = User::where('role',2)->count();
      $total_categories = Category::count();
      $total_maincategories =MainCategories::count();
      $total_listing = Listingtype::count();
      $revenue = DB::table('users')->sum('subcategory');
      $total_SubCategories=DB::table('newsub_categories')->count(DB::raw('DISTINCT name'));

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
       return view('admin.dashboard',compact('users','user_graph','format','latest_users','latest_business','total_business','total_categories','total_business_graph','graph_date','total_listing','revenue','total_SubCategories','total_maincategories'));
    }

    

     public function dashboardYearly(Request $request ,$year)
    {
      
      $users=User::where('role',1)->count();
      $total_business = User::where('role',2)->count();
      $total_categories = Category::count();
      
      $total_maincategories =MainCategories::count();
      $total_listing = Listingtype::count();
      $revenue = DB::table('users')->sum('subcategory');
      $total_SubCategories=DB::table('newsub_categories')->count(DB::raw('DISTINCT name'));
      
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
      return view('admin.dashboard',compact('users','user_graph','format','latest_users','latest_business','total_business','total_categories','total_business_graph','graph_date','total_maincategories','total_listing','revenue','total_SubCategories'));
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
                'email.required' => 'Please enter email.'
            ];    
            $data = $request->validate($rules, $messages);
            // if($request->file('image')){
            //     $path = Storage::putFile('public/user_images', $request->file('image'));
            //     $update_user['image'] = Storage::url($path);
            // }
            if($request->file('image')){ 
                $image = $request->file('image');
                $new_name = rand().'.'.$image->
                getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);  
             } 
            
            
            $update_user['image'] = $new_name; 
            $update_user['email'] = $request->email;

            $user= Admin::where('id',$admin_id)->update($update_user);
            if($user){
                return redirect('admin/dashboard')->with('message','Profile updated successfully.');
            }
        }
        $admin=Admin::where(['id'=>$admin_id])->first();
        return view('admin.update-image',compact('admin'));
    }
     
    
    public function activeInactiveCategory(Request $request ,$id)
    {
       $check_satus=Permission::where('id',$id)->first();     
       if($check_satus->is_active == 1){
          $check_satus=Permission::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/permission-list')->with('message','Permission Inactivated successfully');
       }else{
          $check_satus=Permission::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/permission-list')->with('message','Permission activated successfully');
       }
       
    } 

    
    public function adminWarning(Request $request)
    {
       $users=Admin::orderBy('id','Desc')->get();
       $id=Auth::guard('admin')->user()->id;
       $warning['warning']=$request->message;
       $warning['user_id']=$request->userid;
       $warning['created_at']=Date('Y-m-d H:i');
       $date=Date('Y-m-d H:i');
       $warning['message_date']=date('F d,Y', strtotime($date));
       

       $data=Adminwarning::insert($warning);
       return redirect('admin/users-list')->with('message','Warning Send successfully.');
      
    }

}
