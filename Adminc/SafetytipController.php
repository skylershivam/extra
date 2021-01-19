<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Safety;
class SafetytipController extends Controller
{
    public function safety(Request $request){

      
          
          if($request->isMethod('Post')){
           
            if($request->file('image')){ 
              $image = $request->file('image');
              $new_name = rand().'.'.$image->
              getClientOriginalExtension();
              $image->move(public_path('images'), $new_name);
              $update_user['image'] = $new_name;    
              $products= Safety::where('id',1)->update($update_user); 
              
          }
            
          
          
          
          
          $data=Safety::where('id',1)->update(['safety'=>$request->safety]);
          
          return redirect('admin/safetyTips')->with('message','Safety content updated successfully.');

        }
        $safetys=Safety::first();
                    
         return view('admin.appcontents.safety',compact('safetys'));
    
  }
}
