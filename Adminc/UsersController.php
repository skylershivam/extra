<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
//use App\Admin;
use App\Review;
use App\Forum;
use App\Permission;
use App\Comment;
use Carbon\Carbon;
use App\SubscriptionPlan;
use DB;
class UsersController extends Controller
{
    public function __construct()
    {
       // $this->middleware('admin');
    }	
     

    public function usersList(Request $request)
    {
       $users=  DB::table('users')
       ->select('users.id','users.status','users.first_name', 'users.last_name','users.image'
       ,'users.email','subscription_plans.plan_name','users.subcategory','users.date_to','users.date_from')
       ->join('subscription_plans','users.plan_id','=','subscription_plans.id')
       ->orderBy('id','Desc')->where(['is_deleted'=>1,'role'=>1])->get();
       
       
       $permissions = Permission::get();
       return view('admin.users.users_list',compact(['users','permissions']));
    }

   

    public function editUser(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
             
            $update_user['first_name'] = $request->first_name;  
            $update_user['last_name'] = $request->last_name;
            if($request->post('plan_id')){
            $update_user['plan_id'] = $request->plan_id;
            }
            
            if($request->post('subcategory')){
            $update_user['subcategory']= $request->subcategory;
            }
            
            if($request->post('date_to'))
            { 
             $update_user['date_to']= $request->date_to;
            }
            if($request->post('date_from'))
            {
              $update_user['date_from']= $request->date_from;
            
            }
            if($request->file('image'))
            { 
                $image = $request->file('image');
                $new_name = rand().'.'.$image->
                getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
            }

            if($request->file('image')){ 
                $update_user['image'] =$new_name;
                  }

            $user= User::where('id',$id)->update($update_user);

           
                return redirect('admin/users-list')->with('message','User updated successfully.');
            
        }
        
        $plans=SubscriptionPlan::get();
        $permissions = Permission::get();
        $user=User::where(['id'=>$id])->first();
        return view('admin.users.edit-user',compact(['user','permissions','plans']));
    }

     public function viewUser(Request $request ,$id=0)
    {
        
        $user=User::where(['id'=>$id])->first();
        return view('admin.users.view-user',compact('user'));
    }


    public function deleteUser(Request $request ,$id=0)
    {

        $user=User::where(['id'=>$id])->delete();
        return Redirect::back();
    }

    public function store(Request $request)
    {
        
        $rules = [
            'first_name'=>'required|min:3|max:255',
            'last_name'=>'required|min:3|max:255',
            'email'=>'required|email|unique:users',

        ];
        
        $messages = [
            'first_name.required' => 'Please enter a first name.',
            'last_name.required' => 'Please enter a last name.',
            'email.required' => 'Please enter a email.',
        ];    
        $data = $request->validate($rules, $messages); 
      
         
            
        
        if($request->file('image'))
                        { 
                            $image = $request->file('image');
                            $new_name = rand().'.'.$image->
                            getClientOriginalExtension();
                            $image->move(public_path('images'), $new_name);
                            }
                            
                            if($request->post('first_name')){
                               $save['first_name'] = $request->first_name; 
                            }
                            if($request->post('last_name')){  
                               $save['last_name'] = $request->last_name; 
                            }
                            if($request->post('email')){
                               $save['email'] = $request->email;
                            }  
                            if($request->post('password')){
                               $save['password'] =Hash::make($request->password);
                            }
                            if($request->file('image')){ 
                                $save['image'] =$new_name;
                            }
                            if($request->post('plan_id')){ 
                                 $save['plan_id'] = $request->plan_id; 
                            }
                            if($request->post('subcategory')){     
                             $save['subcategory'] = $request->subcategory;  
                            }

                            if($request->post('date_to')){    
                            $save['date_to']= $request->date_to;
                            }
                            if($request->post('date_from')){  
                            $save['date_from']= $request->date_from;
                            }
                            $user= User::insert($save);
        return redirect('admin/users-list')->with('message','User Type addeded Successfully.');
    }


    public function addUser()
    {
        $permissions = Permission::get();
        $plans = SubscriptionPlan::get();
        
        return view('admin.users.add-user',compact(['permissions','plans']));
    }

    public function businessList(Request $request)
    {
       $business=User::orderBy('id','Desc')->where(['role'=>2])->get();
      
       return view('admin.business.business-list',compact('business'));
    }

    public function editBusiness(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|min:3|max:255',
            ];
            
            $messages = [
                'name.required' => 'Please enter a name.',
            ];    
            $data = $request->validate($rules, $messages);  
            $update_user['name'] = $request->name;  
            $update_user['dob'] = $request->dob;  
            if($request->file('image')){
                $path = Storage::putFile('public/user_images', $request->file('image'));
                $update_user['image'] = Storage::url($path);; 
            }
            $user= User::where('id',$id)->update($update_user);
            if($user){
                return redirect('admin/users-list')->with('message','User updated successfully.');
            }
        }
        
        $plans=SubscriptionPlan::get();
        $user=User::where(['id'=>$id])->first();
        
        return view('admin.users.edit-user',compact(['user','plans']));
    }

     public function viewBusiness(Request $request ,$id=0)
    {
        //die('okok');
        $business=User::where(['id'=>$id])->first();
        //echo $business;die();
        return view('admin.business.view-business',compact('business'));
    }

    public function viewReviews(Request $request ,$id=0)
    {
       
        $reviews = Review::where(['business_id'=>$id])->with('business','user')->orderBy('id','desc')->get();
        
        return view('admin.business.view-reviews',compact('reviews'));
    }

    public function viewForums(Request $request ,$id=0)
    {
        
        $forums = Forum::where(['business_id'=>$id])->with('business','user','comments.user')->withCount('comments')->orderBy('id','desc')->get();
        //echo $forums;die();
        return view('admin.business.view-forums',compact('forums'));
    }

    public function viewComments(Request $request ,$id=0)
    {
      
        $forum = Forum::where(['id'=>$id])->with('business','user','comments.user')->withCount('comments')->orderBy('id','desc')->first();
       //echo $forum;die();
        return view('admin.business.view-comments',compact('forum'));
    }

    public function activeInactive(Request $request ,$id)
    {
       $check_satus=User::where('id',$id)->first();
        if($check_satus->role== 1){
            $user_type = 'User';
            $redirect = 'admin/users-list';
        }else{
            $user_type = 'Business';
            $redirect = 'admin/business-list';
        } 
       if($check_satus->status == 1){
          $check_satus=User::where('id',$id)->update(['status'=>2]);
          return redirect($redirect)->with('message',$user_type.' Inactivated successfully');
       }else{
          $check_satus=User::where('id',$id)->update(['status'=>1]);
          return redirect($redirect)->with('message',$user_type.' activated successfully');
       }
       
    }

    public function activeInactive2(Request $request ,$id)
    {
       $check_satus=User::where('id',$id)->first();
       if($check_satus->status == 1){
          $check_satus=User::where('id',$id)->update(['status'=>2]);
          return redirect('admin/dashboard')->with('message','User Inactivated successfully');
       }else{
          $check_satus=User::where('id',$id)->update(['status'=>1]);
          return redirect('admin/dashboard')->with('message','User activated successfully');
       }
       
    }

    public function myformAjax(Request $request ,$id=0)

    {

       
        $cities = SubscriptionPlan::where(["id"=>$id])->get();
                    
                    
        return json_encode($cities);
       

    }
   
}
