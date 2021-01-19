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
use App\DeliveryCompany;
use Carbon\Carbon;
use DB;
class DeliveryCompaniesController extends Controller
{
    public function __construct()
    {
       // $this->middleware('admin');
    }	
     

    public function companiesList(Request $request)
    {
       $companies=DeliveryCompany::orderBy('id','Desc')->get();
       return view('admin.delivery_companies.companies-list',compact('companies'));
    }

    public function viewCompany(Request $request,$id)
    {
       $company=DeliveryCompany::orderBy('id','Desc')->where(['id'=>$id])->first();
       return view('admin.delivery_companies.view-company',compact('company'));
    }


     public function activeInactiveCompany(Request $request ,$id)
    {
       $check_satus=DeliveryCompany::where('id',$id)->first();
       if($check_satus->is_active == 1){
          $check_satus=DeliveryCompany::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/companies-list')->with('message','Company Inactivated successfully');
       }else{
          $check_satus=DeliveryCompany::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/companies-list')->with('message','Company activated successfully');
       }
       
    }

   




   

   

   

 
   
}
