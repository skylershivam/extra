<?php

namespace App\Http\Controllers\admin;
use App\Wanted;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WantedController extends Controller
{
    public function wantedList(Request $request)
    {
       
      $products = Wanted::all();
        return view('admin.products.wantedlist',compact('products'));
    }

    public function addWanted()
    {
        
      $categories=Category::all();
      return view('admin.products.add-wanted',compact('categories'));
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
           
         
        Wanted::create($form_data);
  
        return \Redirect::back();
    }

    public function editWanted(Request $request ,$id=0)
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
           
            $products= Wanted::where('id',$id)->update($update_user);
            if($products){
                return redirect('admin/wanted-list')->with('message','Product updated successfully.');
            }
        }
        $products=Wanted::where(['id'=>$id])->first();
        return view('admin.products.editwanted',compact('products'));
    }



    public function deleteWanted(Request $request ,$id=0)
    {

        $user=Wanted::where(['id'=>$id])->delete();
        return \Redirect::back();
    }    

    public function viewWanted(Request $request ,$id=0)
    {
        
        $products=Wanted::where(['id'=>$id])->first();
        return view('admin.products.viewwanted',compact('products'));
    }
  }
