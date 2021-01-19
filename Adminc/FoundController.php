<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Found;
use App\Foundcategory;

class FoundController extends Controller
{
    public function foundList(Request $request)
    {
       
      $products = Found::all();
        return view('admin.products.foundlist',compact('products'));
    }

    public function addFound()
    {
        
      $categories=Foundcategory::all();
      return view('admin.products.add-found',compact('categories'));
    }
     
    public function storeFound(Request $request)
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
           Found::create($form_data);
  
           return \Redirect::back();
          }

    public function editFound(Request $request ,$id=0)
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
           
            $products= Found::where('id',$id)->update($update_user);
            if($products){
                return redirect('admin/found-list')->with('message','Product updated successfully.');
            }
        }
        $products=Found::where(['id'=>$id])->first();
        return view('admin.products.editfound',compact('products'));
    }



    public function deleteFound(Request $request ,$id=0)
    {
       
        $products=Found::where(['id'=>$id])->delete();
        return \Redirect::back();
    }     

    public function viewFound(Request $request ,$id=0)
    {
        
        $products=Found::where(['id'=>$id])->first();
        return view('admin.products.viewfound',compact('products'));
    }

  }
