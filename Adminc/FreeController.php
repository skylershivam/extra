<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Free;
use App\Freecategory;
class FreeController extends Controller
{
    
    public function freeList(Request $request)
    {
       
      $products = Free::all();
        return view('admin.products.freelist',compact('products'));
    }


    public function addFree()
    {
        
      $categories=Freecategory::all();
      return view('admin.products.add-free',compact('categories'));
    }

    public function storeFree(Request $request)
    {
       $image = $request->file('image');
         
        $new_name = rand().'.'.$image->
        getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        
     
        $form_data = array(
            'product_name' => $request->product_name,
            'category' => $request->category,
            'image' => $new_name,
            'sale_price' =>$request->sale_price,
            'actual_price' =>$request->actual_price,
            'discount_price' =>$request->discount_price,
            'quantity' =>$request->quantity,
            'description' =>$request->description,
            
            
            
           );
           
         
        Free::create($form_data);
  
        return \Redirect::back();
    }


    public function editFree(Request $request ,$id=0)
    {
        
      
      if($request->isMethod('post')){
          //  dd($request->all());
           
          if($request->file('image')){ 
            $image = $request->file('image');
            $new_name = rand().'.'.$image->
            getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);  
         }
            $update_user['product_name'] = $request->product_name;  
            $update_user['category'] = $request->category;
            $update_user['image'] = $new_name;  
            $update_user['sale_price'] = $request->sale_price;  
            $update_user['actual_price'] = $request->actual_price;  
            $update_user['discount_price'] = $request->discount_price;  
            $update_user['quantity'] = $request->quantity;  
            $update_user['description'] = $request->description;  
               
            // $update_user['dob'] = $request->dob;  
            // if($request->file('image')){
            //     $path = Storage::putFile('public/user_images', $request->file('image'));
            //     $update_user['image'] = Storage::url($path);; 
            // }
           
            $products= Free::where('id',$id)->update($update_user);
            if($products){
                return redirect('admin/free-list')->with('message','Product updated successfully.');
            }
        }
        $products=Free::where(['id'=>$id])->first();
        return view('admin.products.editfree',compact('products'));
    }



    public function deleteFree(Request $request ,$id=0)
    {

        $user=Free::where(['id'=>$id])->delete();
        return \Redirect::back();
    }
    public function viewFree(Request $request ,$id=0)
    {
        
        $products=Free::where(['id'=>$id])->first();
        return view('admin.products.viewfree',compact('products'));
    }
  
  }
