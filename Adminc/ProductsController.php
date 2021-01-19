<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Category;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }	
     
    public function productsList(Request $request)
    {
        $products = Product::with('user','subCategory.category')->orderBy('id','desc')->get();
        return view('admin.products.products-list',compact('products'));
    }


    public function forsaleList(Request $request)
    {
       
      $products = Product::with('user','subCategory.category')->orderBy('id','desc')->get();
        return view('admin.products.forsale-list',compact('products'));
    }
    
    public function addProduct()
    {
        
      $categories=Category::all();
      return view('admin.products.add-products',compact('categories'));
    }

	
    public function viewProduct(Request $request ,$id)
    {
        $product = Product::with('user','subCategory.category','images')->where(['id'=>$id])->orderBy('id','desc')->first();
        return view('admin.products.view-product',compact('product'));
    }

   
    public function activeInactiveProduct(Request $request ,$id)
    {
      $is_active=Product::where('id',$id)->first();
      if($is_active->is_active == 1){
        $is_active=Product::where('id',$id)->update(['is_active'=>2]);
        return redirect('admin/products-list')->with('message','Product inactivaed successfully');
      }else{
        $is_active=Product::where('id',$id)->update(['is_active'=>1]);
        return redirect('admin/products-list')->with('message','Product activated successfully');
      }
       
    }
   
    public function storeProduct(Request $request)
    {
     
     
         
        
        $image = $request->file('image');
         
        $new_name = rand().'.'.$image->
        getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        
     
        $form_data = array(
            'product_name' => $request->product_name,
            'cat_id' => $request->cat_id,
            'image' => $new_name,
            'sale_price' =>$request->sale_price,
            'actual_price' =>$request->actual_price,
            'discount_price' =>$request->discount_price,
            'quantity' =>$request->quantity,
            'description' =>$request->description,
            
            
            
           );
           
       
        Product::create($form_data);
  
        return Redirect::back();
    }

    


    public function deleteProduct(Request $request ,$id=0)
    {

        $user=User::where(['id'=>$id])->delete();
        return Redirect::back();
    }

   

   
}
