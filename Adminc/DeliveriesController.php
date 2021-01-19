<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Delivery;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
class DeliveriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }	
     
    public function pendingList(Request $request)
    {
        //die('ok');
        $deliveries = Delivery::with('order.product.user','deliveryBoy','deliveryCompany')->orderBy('id','desc')->get();
        //echo $deliveries;die();
        return view('admin.deliveries.pending-list',compact('deliveries'));
    }

    public function viewPending(Request $request ,$id)
    {
       $delivery = Delivery::with('order.product.user','deliveryBoy','deliveryCompany')->where(['id'=>$id])->orderBy('id','desc')->first();
       //echo $delivery;die();
        return view('admin.deliveries.view-pending',compact('delivery'));
    }
    
    public function deliveredList(Request $request)
    {
        
        $products = Product::with('user','subCategory.category')->orderBy('id','desc')->get();
        //echo $products;die();
        return view('admin.products.products-list',compact('products'));
    }


    public function viewDelivered(Request $request)
    {
        
        $products = Product::with('user','subCategory.category')->orderBy('id','desc')->get();
        //echo $products;die();
        return view('admin.products.products-list',compact('products'));
    }	
    

   
    public function activeInactiveProduct(Request $request ,$id)
    {
      //die('ok');
       $is_active=Product::where('id',$id)->first();
       if($is_active->is_active == 1){
          $is_active=Product::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/products-list')->with('message','Product inactivaed successfully');
       }else{
          $is_active=Product::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/products-list')->with('message','Product activated successfully');
       }
       
    }
   
   


   

   
}
