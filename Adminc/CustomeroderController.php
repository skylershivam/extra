<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customeroder;
class CustomeroderController extends Controller
{
    public function customerOder(Request $request)
    {
       $orders=Customeroder::orderBy('id','Desc')->get();
       return view('admin.oder.customerlist',compact('orders'));
    }


    
    public function editcustomerOder(Request $request ,$id=0)
    {
        
      
      if($request->isMethod('post')){
          //  dd($request->all());
           
          
            
            $update_user['is_active'] = $request->is_active;  
               
            // $update_user['dob'] = $request->dob;  
            // if($request->file('image')){
            //     $path = Storage::putFile('public/user_images', $request->file('image'));
            //     $update_user['image'] = Storage::url($path);; 
            // }
           
            $orders= Customeroder::where('id',$id)->update($update_user);
            if($orders){
                return redirect('admin/view-customeroders')->with('message','Product updated successfully.');
            }
        }
        $orders=Customeroder::where(['id'=>$id])->first();
        return view('admin.oder.editcustomerlist',compact('orders'));
    }

    }

