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
use App\Subscription;
use App\SubscriptionPlan;
use Carbon\Carbon;
use DB;
class SubscriptionsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin');
    }	
     

    public function subscriptionPlanList(Request $request)
    {
       $subscription_plans=SubscriptionPlan::orderBy('id','Desc')->get();
       return view('admin.subscriptionplans.subscription-plan-list',compact('subscription_plans'));
    }

   

    public function editSubscriptionPlan(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            
            $update_plan['plan_name'] = $request->plan_name;  
            $update_plan['price'] = $request->price;  
            $update_plan['description'] = $request->description;  
            if($request->file('image')){
                $path = Storage::putFile('public/subscription_plans', $request->file('image'));
                $update_plan['image'] = Storage::url($path);; 
            }
            $user= SubscriptionPlan::where('id',$id)->update($update_plan);
            return redirect('admin/subscription-plan-list')->with('message','Plan updated successfully.');
            
        }
        $subscription_plan=SubscriptionPlan::where(['id'=>$id])->first();
        return view('admin.subscriptionplans.edit-subscription-plan',compact('subscription_plan'));
    }


    public function subscriptionsList(Request $request ,$id=0){
        $subscriptions = Subscription::with('business','subscriptionPlan')->orderBy('id','Desc')->whereRaw('id IN (select MAX(id) FROM subscriptions GROUP BY business_id)')->get();
      //echo $subscriptions;die();
        return view('admin.subscriptions.subscriptions-list',compact('subscriptions'));
        
    }


    public function viewSubscriptionHistory(Request $request ,$id=0)
    {
       
        $subscriptions = Subscription::where('business_id',$id)->with('business','subscriptionPlan')->get();
        return view('admin.subscriptions.view-subscription-history',compact('subscriptions'));
        
    }

    

 
   
}
