<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MainCategories;
use App\Category;
use App\Storedata;
class MainCategoriesController extends Controller
{

    public function maincategoriesList(Request $request)
    {
       $maincategories=Storedata::orderBy('id','Desc')->get();
       return view('admin.maincategory.maincategories',compact('maincategories'));
    }
    
    public function addMainCategory(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            
            $save_maincategory['maincategoryname'] = $request->maincategoryname;
            $save_maincategory['Listing_type'] = $request->Listing_type;  
            $save_maincategory['category'] = $request->category ;    
            $save_maincategory['created_at'] = Date('Y-m-d H:i');
            
            if($request->file('image'))
            { 
                $image = $request->file('image');
                $new_name = rand().'.'.$image->
                getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
            }

            if($request->file('image')){ 
              $save_maincategory['image'] =$new_name;
                }
          /*  if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }*/
            
            $user= Storedata::insert($save_maincategory);
            return redirect('admin/maincategories-list')->with('message','Main Category added successfully.');
            
        }
        $categories=Category::all();
        $maincategories=MainCategories::all();
        return view('admin.maincategory.add-maincategory',compact(['categories','maincategories']));
    
    }

    public function activeInactiveCategory(Request $request ,$id)
    {
       $check_satus=Storedata::where('id',$id)->first();
       if($check_satus->is_active == 1){
          $check_satus=Storedata::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/maincategories-list')->with('message','Main Category Inactivated successfully');
       }else{
          $check_satus=Storedata::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/maincategories-list')->with('message','Main Category activated successfully');
       }
       
    }

    public function editCategory(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
              
           
           
            if($request->post('maincategoryname')){ 
              $update_category['maincategoryname'] = $request->maincategoryname;
            }
         
            if($request->post('Listing_type')){ 
                $update_category['Listing_type'] = $request->Listing_type;  
              }
           
            
            
            if($request->post('category')){ 
              $update_category['category'] = $request->category ;      
              }
           
            
            
            if($request->file('image'))
            { 
                $image = $request->file('image');
                $new_name = rand().'.'.$image->
                getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
            }
            
            if($request->file('image')){ 
              $update_category['image'] =$new_name;
                }
           
           
            $user= Storedata::where('id',$id)->update($update_category);
            return redirect('admin/maincategories-list')->with('message','Sub Category updated successfully.');
            
        }
        $maincategories=MainCategories::all();
        $categories=Category::all();
        $newstore=Storedata::where(['id'=>$id])->first();
        
        return view('admin.maincategory.edit-maincategory',compact(['newstore','categories','maincategories']));
    }
    public function deleteCategory(Request $request ,$id=0)
    {
        $user=Storedata::where(['id'=>$id])->delete();
        return redirect('admin/maincategories-list')->with('message','Sub Category name deleted successfully.');

    }
}
