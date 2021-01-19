<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Term;
class termController extends Controller
{
    public function termsAndConditions(Request $request){
            
        if($request->isMethod('Post')){
          
          if($request->file('image')){ 
            $image = $request->file('image');
            $new_name = rand().'.'.$image->
            getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $update_user['image'] = $new_name;    
            $products= Term::where('id',1)->update($update_user); 
          }

        Term::where('id',1)->update(['term'=>$request->term]);
        return redirect('admin/terms-and-conditions')->with('message','Terms and conditions content updated successfully.');

        }

        $term=Term::first();
        
   		   return view('admin.appcontents.terms-and-conditions',compact('term'));
    }
}
