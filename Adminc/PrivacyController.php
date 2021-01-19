<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\privacy;
class PrivacyController extends Controller
{
    
    public function privacyPolicy(Request $request){
          
        if($request->isMethod('Post')){
          
          if($request->file('image')){ 
            $image = $request->file('image');
            $new_name = rand().'.'.$image->
            getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $update_user['image'] = $new_name;    
            $products= privacy::where('id',1)->update($update_user); 
        }
          
           $data= privacy::where('id',1)->update(['privacy'=>$request->privacy]);
           return redirect('admin/privacy-policy')->with('message','Terms and conditions content updated successfully.');

          
       



        }

        $privacy=privacy::first();
        
   		   return view('admin.appcontents.privacy-policy',compact('privacy'));
    }
}
