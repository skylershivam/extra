<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forsale;
use App\Category;


class ForsaleController extends Controller
{
    public function forsaleList(Request $request)
    {
       
      $products = Forsale::all();
        return view('admin.products.forsale-list',compact('products'));
    }

    public function addForsale()
    {
        
      $categories=Category::all();
      return view('admin.products.add-forsale',compact('categories'));
    }

    public function storeForsale(Request $request)
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
           
         
        Forsale::create($form_data);
  
        return \Redirect::back();
    }



     
    public function deleteForsale(Request $request ,$id=0)
    {

        $user=Forsale::where(['id'=>$id])->delete();
        return \Redirect::back();
    }

  //   public function editForsale(Request $request ,$id=0)
  //   {
  //     $products=Forsale::where(['id'=>$id])->get();
  //     return view('admin.products.editforsale',compact('products'));

  //     if($request->isMethod('post')){
        
  //      $image = $request->file('image');
         
  //      $new_name = rand().'.'.$image->
  //      getClientOriginalExtension();
  //      $image->move(public_path('images'), $new_name);
       
    
  //      $form_data = array(
  //          'product_name' => $request->product_name,
  //          'category' => $request->category,
  //          'image' => $new_name,
  //          'sale_price' =>$request->sale_price,
  //          'actual_price' =>$request->actual_price,
  //          'discount_price' =>$request->discount_price,
  //          'quantity' =>$request->quantity,
  //          'description' =>$request->description,
           
           
           
  //         );
          
        
      
         
  //         $products=Forsale::create($form_data);
  //         return view('admin.products.forsale-list',compact('products')); 
  //       }
          
  // }
  public function editForsale(Request $request ,$id=0)
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
         
          $products= Forsale::where('id',$id)->update($update_user);
          if($products){
              return redirect('admin/forsale-list')->with('message','Product updated successfully.');
          }
      }
      $products=Forsale::where(['id'=>$id])->first();
      return view('admin.products.editforsale',compact('products'));
  }

  public function viewForsale(Request $request ,$id=0)
  {
      
      $products=Forsale::where(['id'=>$id])->first();
      return view('admin.products.viewforsale',compact('products'));
  }
  }
