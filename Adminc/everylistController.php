<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Free;
use App\Forsale;
use App\Torent;
use App\Lost;
use App\Swap;
use App\Found;
use App\Wanted;
use App\everylist;
use App\Listingtype;
use App\Category;
use App\MainCategories;
use App\NewSubcategory;
use App\Storedata;
use DB;
use Auth;
use App\Adimage;
use Storage;
use App\User;
use App\State;
use App\Geocoding;
use GuzzleHttp;
class everylistController extends Controller
{
    public function everyList(Request $request)
    {
    
      $lists= Listingtype::all(); 
      $products = DB::table('everylists')
      ->select('everylists.*','ad_image.proimage','storemaincategories.maincategoryname','everylists.Listing_type','everylists.is_active')
      ->join('storemaincategories','everylists.maincategory_id','=','storemaincategories.id')
      ->join('ad_image','everylists.id','=','ad_image.product_id')

      ->orderBy('id','Desc')->get();
      
         
        return view('admin.products.every',compact(['products','lists']));
    }
     
    public function addList()
    {
        
      $states = state::get();
      $categories=Category::all();
      $lists= Listingtype::all();
      $maincategories=Storedata::orderBy('maincategoryname','asc')->groupBy('maincategoryname')->get();
      return view('admin.products.add-list',compact(['categories','lists','maincategories','states']));
    }   
    
    public function storeList(Request $request)
    {
       
       
       
      
       
       
        // $image = $request->file('image');
         
        // $new_name = rand().'.'.$image->
        // getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);
         $user_id=Auth::guard('admin')->id();
        
        
 
        
            
      
        
        $sale = $request->sale_price;
        $b = str_replace( ',', '', $sale );
        
        if( is_numeric( $b ) ) {
            $sale = $b;
        }
        
        $actual = $request->actual_price;
        $b = str_replace( ',', '', $actual );
        
        if( is_numeric( $b ) ) {
          $actual = $b;
        }
        
        $discount = $request->discount_price;
        $b = str_replace( ',', '', $discount );
        
        if( is_numeric( $b ) ) {
          $discount = $b;
        }
        
            $qty=$request->quantity;
           $user_id = Auth::guard('admin')->id();
           $product = new everylist;
          $product->user_id = $user_id;
          $product->product_name = $request->product_name;
          $product->quantity = $request->quantity;
          $product->category  = $request->category ;
          $product->Listing_type = $request->Listing_type;
          $product->sale_price =$sale;
          $product->actual_price=$actual;
          $product->discount_price=$discount;
          $product->description=$request->description;
          $product->state = $request->Location;
          
          $geo= new Geocoding("AIzaSyCEgC4ZGMMVlPjDEUX2YPp32ZQzP7zb-k8");
          $coordinates=$geo->getCoordinates($request->Location);
          
        $latitude = $coordinates['latitude'];
        // $latitude = 29.924812399999993;

        $longitude =  $coordinates['longitude'];
        
          $product->latitude = $latitude;
          $product->longitude =$longitude;
          
          
          
          
          $product->maincategory_id= $request->maincategory_id;
         
          
         
          $subtotal=  $qty*$sale;
          $product->sub_total=$subtotal; 
     
          
          $product->save();

           
           $productId = $product->id;
           
        if($request->file('pro-image')){
          $productId = $product->id;
            foreach ($request->file('pro-image') as $key => $pro_image) {
              $product_images = new Adimage;
              $path = Storage::putFile('public/user_images', $pro_image);
              $product_images['proimage'] = Storage::url($path);; 
              $product_images['users_id'] = $user_id;
              $product_images['product_id'] = $productId;
              $product_images->save();
            }
              
        }
          
         
          
  
           return redirect('admin/every-list')->with('message','Listing added successfully.');
    }

    public function editList(Request $request ,$id=0)
    {
        
      
      if($request->isMethod('post')){
          //  dd($request->all());
           
        //   $rules = [
        //     'product_name'=>'required',
        //     'category'=>'required',
        //     'Listing_type'=>'required',
        //     'image'=>'required',
        //     'sale_price'=>'required',
        //     'actual_price'=>'required',
        //     'image'=>'required',
        //     'discount_price'=>'required',
        //     'quantity'=>'required',
        //     'description'=>'required'
            
        // ];
        // $messages = [
        //     'product_name.required' => 'Please enter name.',
        //     'category.required' => 'Please enter category.',
        //     'Listing_type.required' => 'Please select Listing_type.',
        //     'sale_price.required' => 'Please enter sale_price.',
        //     'actual_price.required' => 'Please enter actual price.',
        //     'image.required' => 'Please select image.',
        //     'discount_price.required' => 'Please enter discount_price.',
        //     'quantity.required' => 'Please enter quantity.',
        //     'description.required' => 'Please enter description.',
           
        // ];    
        // $data = $request->validate($rules, $messages);
        
        
         
            
            
         
            $update_user['product_name'] = $request->product_name;  
            $update_user['category'] = $request->category;
            $update_user['Listing_type'] = $request->Listing_type;  
            // $update_user['image'] = $new_name;  
            $update_user['sale_price'] = $request->sale_price;  
            $update_user['actual_price'] = $request->actual_price;  
            $update_user['discount_price'] = $request->discount_price;  
            $update_user['quantity'] = $request->quantity;  
            $update_user['description'] = $request->description;  
            $update_user['state'] = $request->location;  
            
           
           
              
        if($request->file('pro-image')){
          
          foreach ($request->file('pro-image') as $key => $pro_image) {
            $product_images = new Adimage;
            $path = Storage::putFile('public/user_images', $pro_image);
            $product_images['proimage'] = Storage::url($path);
            
            foreach($product_images as $product_image)
            $new= Adimage::where('product_id','=',$id)->update($product_image);
              }
            
             
          }
        
          $products= everylist::where('id',$id)->update($update_user);
            
            if($products){
                return redirect('admin/every-list')->with('message','Listing updated successfully.');
            }
        }
       
        $newid=$request->id;
        
        $products = DB::table('everylists')
      ->select('everylists.*','storemaincategories.maincategoryname','everylists.Listing_type')
      ->join('storemaincategories','everylists.maincategory_id','=','storemaincategories.id')
      ->where(['everylists.id'=>$newid])->first();
        
        $maincategories=Storedata::all();

        return view('admin.products.editlist',compact(['products','maincategories']));
    }


    public function deleteList(Request $request ,$id=0)
    {

        $user=everylist::where(['id'=>$id])->delete();
        return \Redirect::back();
    }



    public function myformAjax(Request $request ,$id=0)

    {

       
        $cities = NewSubCategory::where(["maincategory_id"=>$id])->get();
                    
                    
        return json_encode($cities);
       

    }

   
    public function activeInactiveEvery(Request $request ,$id)
    {
       $check_satus=everylist::where('id',$id)->first();
       if($check_satus->is_active == 1){
          $check_satus=everylist::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/every-list')->with('message','Listing Inactivated successfully');
       }else{
          $check_satus=everylist::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/every-list')->with('message','Listing activated successfully');
       }
       
    }



}

