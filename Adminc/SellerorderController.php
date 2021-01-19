<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sellerorder;
class SellerorderController extends Controller
{
    public function sellerOrder(Request $request)
    {
       $orders=Sellerorder::orderBy('id','Desc')->get();
       return view('admin.oder.sellerlist',compact('orders'));
    }

    public function editsellerOder(Request $request ,$id=0)
    {
        
      
      if($request->isMethod('post')){
          //  dd($request->all());
           
          
            
            $update_user['is_active'] = $request->is_active;  
               
            // $update_user['dob'] = $request->dob;  
            // if($request->file('image')){
            //     $path = Storage::putFile('public/user_images', $request->file('image'));
            //     $update_user['image'] = Storage::url($path);; 
            // }
           
            $orders= Sellerorder::where('id',$id)->update($update_user);
            if($orders){
                return redirect('admin/view-sellerorders')->with('message','Product updated successfully.');
            }
      
      
        }
        $orders=Sellerorder::where(['id'=>$id])->first();
        return view('admin.oder.editsellerlist',compact('orders'));
    }   
}
