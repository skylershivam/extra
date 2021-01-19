<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewSubcategory;
use App\MainCategories;
use DB;
class SubCategoryController extends Controller
{
    public function subcategoriesList(Request $request)
    {
       
     
       $subcategories=DB::table('newsub_categories')
->select('newsub_categories.maincategory_id','maincategories.maincategoryname','newsub_categories.name', 'newsub_categories.maincategory_id','newsub_categories.is_active','newsub_categories.created_at','newsub_categories.updated_at','newsub_categories.id' )
->join('maincategories','newsub_categories.maincategory_id','=','maincategories.id')
->get();
return view('admin.Subcategory.subcategories',compact(['subcategories']));
    }
    
    
    


    public function addSubCategory(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required',
                'maincategory_id'=>'required',
                
                //'name'=>'unique:categories,name',
            ];
            $messages = [
                'name.required' => 'Please enter Maincategory name.',
                'maincategory.required'=>'Please enter Subcategory name.',
            ];    
            $data = $request->validate($rules, $messages);  
            $save_maincategory['name'] = $request->name;
            $save_maincategory['maincategory_id'] = $request->maincategory_id;
              
            $save_maincategory['created_at'] = Date('Y-m-d H:i'); 
          /*  if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }*/
            $user= NewSubcategory::insert($save_maincategory);
            return redirect('admin/subcategories-list')->with('message','SubCategory added successfully.');
            
        }
        $maincategories=MainCategories::all();
        return view('admin.Subcategory.add-subcategory',compact(['maincategories']));
              

        
    }

    public function activeInactiveCategory(Request $request ,$id)
    {
       $check_satus=NewSubcategory::where('id',$id)->first();     
       if($check_satus->is_active == 1){
          $check_satus=NewSubcategory::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/subcategories-list')->with('message','Sub Category Inactivated successfully');
       }else{
          $check_satus=NewSubcategory::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/subcategories-list')->with('message','Sub Category activated successfully');
       }
       
    } 

    public function editSubCategory(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
              
            $update_category['name'] = $request->name;  
            
            
            if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $update_category['image'] = Storage::url($path);; 
            }
            
            $user= NewSubcategory::where('id',$id)->update($update_category);
            return redirect('admin/subcategories-list')->with('message','Subcategory updated successfully.');
            
        }
        $newid=$request->id;
        $category=
        DB::table('newsub_categories')
        ->select('newsub_categories.maincategory_id','maincategories.maincategoryname','newsub_categories.name', 
        'newsub_categories.maincategory_id','newsub_categories.is_active','newsub_categories.created_at',
        'newsub_categories.updated_at','newsub_categories.id' )
        ->join('maincategories','newsub_categories.maincategory_id','=','maincategories.id')
        ->where(['newsub_categories.id'=>$newid])->first();
        
        return view('admin.Subcategory.edit-subcategory',compact(['category']));
    }
          

    public function deleteSubCategory(Request $request ,$id=0)
    {
        $user=NewSubcategory::where(['id'=>$id])->delete();
        return redirect('admin/subcategories-list')->with('message','Subcategory Category deleted successfully.');

    }

}
