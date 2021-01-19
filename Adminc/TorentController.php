<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Torent;
use App\Torentcategory;
class TorentController extends Controller
{
    public function torentList(Request $request)
    {
       
      $products = Torent::all();
        return view('admin.products.torentlist',compact('products'));
    }

    public function addTorent()
    {
        
      $categories=Torentcategory::all();
      return view('admin.products.add-torent',compact('categories'));
    }
     
    public function storeWanted(Request $request)
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
           Torent::create($form_data);
  
           return \Redirect::back();
    }
   
    public function editTorent(Request $request ,$id=0)
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
           
            $products= Torent::where('id',$id)->update($update_user);
            if($products){
                return redirect('admin/torent-list')->with('message','Product updated successfully.');
            }
        }
        $products=Torent::where(['id'=>$id])->first();
        return view('admin.products.edittorent',compact('products'));
    }



    public function deleteTorent(Request $request ,$id=0)
    {

        $user=Torent::where(['id'=>$id])->delete();
        return \Redirect::back();
    }    
    
    public function viewTorent(Request $request ,$id=0)
    {
        
        $products=Torent::where(['id'=>$id])->first();
        return view('admin.products.viewtorent',compact('products'));
    }
}
