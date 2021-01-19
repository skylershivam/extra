<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
//use App\Admin;
use App\Category;
use App\SubCategory;
use App\SellCategory;
use Carbon\Carbon;
use DB;
class CategoriesController extends Controller
{
    public function __construct()
    {
       // $this->middleware('admin');
    }	
     

    public function sellCategoriesList(Request $request)
    {
       $categories=SellCategory::orderBy('id','Desc')->get();
       return view('admin.categories.sell-categories-list',compact('categories'));
    }

    public function categoriesList(Request $request)
    {
       $categories=Category::orderBy('id','Desc')->get();
       return view('admin.categories.categories-list',compact('categories'));
    }


     public function subCategoriesList(Request $request)
    {
       $sub_categories=SubCategory::orderBy('id','Desc')->with('category')->get();
       return view('admin.categories.sub-categories-list',compact('sub_categories'));
    }

   

    public function editCategory(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|min:3|max:255',
                'name'=>'required|min:3|max:255|unique:categories,name,'.$id,

            ];
            
            $messages = [
                'name.required' => 'Please enter category name.',
                'name.unique' => 'Category name already exists.',
            ];    
            $data = $request->validate($rules, $messages);  
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
            
            $update_category['name'] = $request->name;  
              
            
            $user= Category::where('id',$id)->update($update_category);
            return redirect('admin/categories-list')->with('message','Listing Category updated successfully.');
            
        }
        $category=Category::where(['id'=>$id])->first();
        return view('admin.categories.edit-category',compact('category'));
    }

     
    public function deleteCategory(Request $request ,$id=0)
    {
        $user=Category::where(['id'=>$id])->delete();
        return redirect('admin/categories-list')->with('message','Listing Category deleted successfully.');
    }
    
    
    
    
    public function editSubCategory(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
           // dd($request->all());
            $rules = [
                'name'=>'required|min:3|max:255',
                'name'=>'required|min:3|max:255|unique:sub_categories,name,'.$id,
                
               
            ];

            
            $messages = [
                'name.required' => 'Please enter category name.',
                'name.unique' => 'Category name already exists.',
               
               
            ];    
            $data = $request->validate($rules, $messages);  
            
            
            $update_category['name'] = $request->name;  
            $update_category['category_id'] = $request->category_id;  
            
            $user= SubCategory::where('id',$id)->update($update_category);
            return redirect('admin/sub-categories-list')->with('message','Category updated successfully.');
            
        }
         $categories=Category::orderBy('id','Desc')->get();
         $category=SubCategory::where(['id'=>$id])->first();
        return view('admin.categories.edit-sub-category',compact('categories','category'));
    }


    public function addSellCategory(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|min:3|max:255',
            ];
            $messages = [
                'name.required' => 'Please enter category name.',
            ];    
            $data = $request->validate($rules, $messages);  
            $save_category['name'] = $request->name;  
            if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }
            $user= SellCategory::insert($save_category);
            return redirect('admin/sell-categories-list')->with('message','Category added successfully.');
            
        }
        return view('admin.categories.add-sell-category');
    }

    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|unique:categories,name|min:3|max:255',
                //'name'=>'unique:categories,name',
            ];
            $messages = [
                'name.required' => 'Please enter category name.',
                'name.unique' => 'Category name already exists.',
            ];    
            $data = $request->validate($rules, $messages);  
            
            if($request->file('image'))
            { 
                $image = $request->file('image');
                $new_name = rand().'.'.$image->
                getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                }
            
            if($request->file('image')){ 
                $save_category['image'] =$new_name;
                }
            
            $save_category['name'] = $request->name;  
            $save_category['created_at'] = Date('Y-m-d H:i'); 
          /*  if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }*/
            $user= Category::insert($save_category);
            return redirect('admin/categories-list')->with('message','Listing Category added successfully.');
            
        }

        return view('admin.categories.add-category');
    }


    public function addSubCategory(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|unique:sub_categories,name|min:3|max:255',
                 'category_id'=>'required',
                 //'name'=>'unique:sub_categories,name',
            ];
            $messages = [
                'name.required' => 'Please enter category name.',
                 'category_id.required' => 'Please select category.',
                 'name.unique' => 'Category name already exists.',
            ];    
            $data = $request->validate($rules, $messages);  
            $save_sub_category['category_id'] = $request->category_id;  
            $save_sub_category['name'] = $request->name;  
            $save_sub_category['created_at'] = Date('Y-m-d H:i'); 
          /*  if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }*/
            $user= SubCategory::insert($save_sub_category);
            return redirect('admin/sub-categories-list')->with('message','Category added successfully.');
            
        }
        $categories=Category::orderBy('id','Desc')->get();

        return view('admin.categories.add-sub-category',compact('categories'));
    }

    public function activeInactiveCategory(Request $request ,$id)
    {
       $check_satus=Category::where('id',$id)->first();
       if($check_satus->is_active == 1){
          $check_satus=Category::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/categories-list')->with('message','Category Inactivated successfully');
       }else{
          $check_satus=Category::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/categories-list')->with('message','Category activated successfully');
       }
       
    }

     public function activeInactiveSubCategory(Request $request ,$id)
    {
       $check_satus=SubCategory::where('id',$id)->first();
       if($check_satus->is_active == 1){
          $check_satus= SubCategory::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/sub-categories-list')->with('message','Category Inactivated successfully');
       }else{
          $check_satus=SubCategory::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/sub-categories-list')->with('message','Category activated successfully');
       }
       
    }


    public function addCatJson(Request $request)
    {
     //die('ok');
 
      $variable = json_decode($request->category,true);  

      foreach ($variable as $key => $value) {
        //dd($value);
          if(empty($id)){
            $id = Category::insertGetId(['name'=>'CVS & JOB SEEKERS']);
          }
          SubCategory::insert(['category_id'=>$id,'name'=>$value]);
      }
      die('ok');
    }
      
       
    




   

   

   

 
   
}
