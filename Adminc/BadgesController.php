<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\BadgeRequest;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
class BadgesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }	
     
    public function badgeRequests(Request $request)
    {
        
        $badge_requests = BadgeRequest::with('user')->orderBy('id','desc')->get();
        //echo $reports;die();
        return view('admin.badge_requests.badge-requests',compact('badge_requests'));
    }


	
    public function viewRequest(Request $request ,$id)
    {
        $request = BadgeRequest::with('user')->where(['id'=>$id])->first();
     //   echo $report;die();
        return view('admin.badge_requests.view-request',compact('request'));
    }

   
    public function requestStatus(Request $request ,$id)
    {
       $check_satus=BadgeRequest::where('id',$id)->first();
       if($check_satus->request_status == 1){
          $check_satus=BadgeRequest::where('id',$id)->update(['request_status'=>2]);
          return redirect('admin/badge-requests')->with('message','Request approevd successfully');
       }else{
          $check_satus=BadgeRequest::where('id',$id)->update(['request_status'=>1]);
          return redirect('admin/badge-requests')->with('message','Request declined successfully');
       }
       
    }


    public function requestApprove(Request $request ,$id)
    {
       $check_satus=BadgeRequest::where('id',$id)->first();
        $check_satus=BadgeRequest::where('id',$id)->update(['request_status'=>2]);
        return redirect('admin/badge-requests')->with('message','Request approved successfully');
      
       
    }

    public function requestDecline(Request $request ,$id)
    {
        $check_satus=BadgeRequest::where('id',$id)->first();
        $check_satus=BadgeRequest::where('id',$id)->update(['request_status'=>3]);
        return redirect('admin/badge-requests')->with('message','Request declined successfully');
              
    }

   
   


   

   
}
