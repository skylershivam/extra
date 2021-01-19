<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Challenge;
use App\AppContent;
use App\ReturnRefundContent;
use Hash;
use Redirect;
use Storage;
use Validator;
use App\Safety;
use Auth;


class AppContentsController extends Controller
{
    public function aboutUs(Request $requset){

        if($requset->isMethod('Post')){
          // $AppContent  =  new	AppContent();
          // $AppContent->about_us = $requset->about_us;
          // $AppContent->save();
        	AppContent::where('id',1)->update(['about_us'=>$requset->about_us]);
        return redirect('admin/about-us')->with('message','About us content updated successfully.');
        }
        $about_us=AppContent::first();
   		return view('admin.appcontents.newabout',compact('about_us'));
   }

    public function termsAndConditions(Request $requset){
            
        
          
          if($request->file('image')){ 
            $image = $request->file('image');
            $new_name = rand().'.'.$image->
            getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $update_user['image'] = $new_name;    
            $products= AppContent::where('id',1)->update($update_user); 
          
          
          AppContent::where('id',1)->update(['terms_and_conditions'=>$requset->terms_and_conditions]);
          return redirect('admin/terms-and-conditions')->with('message','Terms and conditions content updated successfully.');

          
        }



        

        $terms_and_conditions=AppContent::first();
        
   		   return view('admin.appcontents.terms-and-conditions',compact('terms_and_conditions'));
    }

    public function privacyPolicy(Request $requset){

        if($requset->isMethod('Post')){
          // $AppContent  =  new	AppContent();
          // $AppContent->about_us = $requset->about_us;
          // $AppContent->save();
        	AppContent::where('id',1)->update(['privacy_policy'=>$requset->privacy_policy]);
          return redirect('admin/privacy-policy')->with('message','Privacy policy content updated successfully.');

        }
        $privacy_policy=AppContent::first();
   		return view('admin.appcontents.privacy-policy',compact('privacy_policy'));
    }

    public function billingPolicy(Request $requset){

        if($requset->isMethod('Post')){
          // $AppContent  =  new  AppContent();
          // $AppContent->about_us = $requset->about_us;
          // $AppContent->save();
          AppContent::where('id',1)->update(['billing_policy'=>$requset->billing_policy]);
          return redirect('admin/billing-policy')->with('message','Billing policy content updated successfully.');

        }
        $billing_policy=AppContent::first();
         return view('admin.appcontents.billing-policy',compact('billing_policy'));
    }

    public function refundPolicy(Request $requset){

        if($requset->isMethod('Post')){
         // dd($requset->all());
          // $AppContent  =  new  AppContent();
          // $AppContent->about_us = $requset->about_us;
          // $AppContent->save();
          AppContent::where('id',1)->update(['refund_policy'=>$requset->refund_policy]);
          return redirect('admin/refund-policy')->with('message','Refund policy content updated successfully.');

        }
        $refund_policy=AppContent::first();
         return view('admin.appcontents.refund-policy',compact('refund_policy'));
    }

    public function safety(Request $request){

        if($request->isMethod('Post')){
          
          if($request->isMethod('Post')){
          
            if($request->file('image')){ 
              $image = $request->file('image');
              $new_name = rand().'.'.$image->
              getClientOriginalExtension();
              $image->move(public_path('images'), $new_name);
              $update_user['image'] = $new_name;    
              $products= Safety::where('id',1)->update($update_user); 
          }
            
          
          
          
          
          Safety::where('id',1)->update(['safety'=>$request->safety]);
          return redirect('admin/safety')->with('message','Safety content updated successfully.');

        }
        $safetys=Safety::first();
         return view('admin.appcontents.safety',compact('safetys'));
    }
  }
    public function shipping(Request $requset){

        if($requset->isMethod('Post')){
          // $AppContent  =  new  AppContent();
          // $AppContent->about_us = $requset->about_us;
          // $AppContent->save();
          AppContent::where('id',1)->update(['shipping'=>$requset->shipping]);
          return redirect('admin/shipping')->with('message','Shipping content updated successfully.');

        }
        $shipping=AppContent::first();
         return view('admin.appcontents.shipping',compact('shipping'));
    }

     public function buying(Request $requset){

        if($requset->isMethod('Post')){
          // $AppContent  =  new  AppContent();
          // $AppContent->about_us = $requset->about_us;
          // $AppContent->sav e();
          AppContent::where('id',1)->update(['buying'=>$requset->buying]);
          return redirect('admin/buying')->with('message','Buying content updated successfully.');

        }
        $buying=AppContent::first();
         return view('admin.appcontents.buying',compact('buying'));
    }

    public function returnRefunds(Request $requset){

        $return_refunds=ReturnRefundContent::All();
      return view('admin.return_refunds.return-refund-contents',compact('return_refunds'));
    }

    public function addReturnRefundContent(Request $request){

        if($request->isMethod('Post')){

          $rules = [
                'title'=>'required|min:3',
                'description'=>'required|min:3',

            ];
            
            $messages = [
                'title.required' => 'Please add title.',
                'description.required' => 'Please add description.',
            ];    
            $data = $request->validate($rules, $messages);  
          
          $save_returns['title'] = $request->title;
          $save_returns['description'] = $request->description;
          $save_returns['created_at'] = Date('Y-m-d H:i');
          ReturnRefundContent::insert($save_returns);
          return redirect('admin/return-refunds')->with('message','Content added successfully.');
        }

        return view('admin.return_refunds.add-return-refund');
       
    }

    
    public function editReturnRefundContent(Request $request ,$id){

        if($request->isMethod('Post')){

          $rules = [
                'title'=>'required|min:3',
                'description'=>'required|min:3',

            ];
            
            $messages = [
                'title.required' => 'Please add title.',
                'description.required' => 'Please add description.',
            ];    
            $data = $request->validate($rules, $messages);  
          
          $save_returns['title'] = $request->title;
          $save_returns['description'] = $request->description;
          $save_returns['created_at'] = Date('Y-m-d H:i');
          ReturnRefundContent::where(['id'=>$id])->update($save_returns);
          return redirect('admin/return-refunds')->with('message','Content added successfully.');
        }
         $return_refund =ReturnRefundContent::where(['id'=>$id])->first();
        return view('admin.return_refunds.edit-return-refund',compact('return_refund'));
       
    }

    public function deleteReturnRefundContent(Request $request ,$id){
         $return_refund =ReturnRefundContent::where(['id'=>$id])->delete();
         return redirect('admin/return-refunds')->with('message','Content deleted successfully.');
       
    }
}
