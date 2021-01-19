<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Report;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
class ReportsController extends Controller
{
    public function __construct()
    {
       // $this->middleware('admin');
    }	
     
    public function reportsList(Request $request)
    {
        
        $reports = Report::with('reportBy','reportTo')->orderBy('id','desc')->get();
        //echo $reports;die();
        return view('admin.reports.reports',compact('reports'));
    }


	
    public function viewReport(Request $request ,$id)
    {
        $report = Report::with('reportBy','reportTo')->where(['id'=>$id])->first();
     //   echo $report;die();
        return view('admin.reports.view-report',compact('report'));
    }

   
   


   

   
}
