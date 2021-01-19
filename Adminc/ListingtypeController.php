<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listingtype;
class ListingtypeController extends Controller
{
    public function listingtypeList(Request $request)
    {
       
        $lists= Listingtype::all();
        return view('admin.list.listingtypelist',compact('lists'));
    }

    
   
     
    public function addlistingtypeList(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|unique:categories,name|min:3|max:255',
                //'name'=>'unique:categories,name',
            ];
            $messages = [
                'name.required' => 'Please enter list name.',
                'name.unique' => 'List name already exists.',
            ];    
            $data = $request->validate($rules, $messages);  
            $save_category['name'] = $request->name;  
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
            
            
            $save_category['created_at'] = Date('Y-m-d H:i'); 
          /*  if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }*/
            $user= Listingtype::insert($save_category);
            return redirect('admin/listing-type')->with('message','Listing Type added successfully.');
            
        }

        return view('admin.list.addlistingtype');
    }

    

    public function editlistingtypeList(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|min:3|max:255',
                'name'=>'required|min:3|max:255|unique:categories,name,'.$id,

            ];
            
            $messages = [
                'name.required' => 'Please enter list name.',
                'name.unique' => 'List name already exists.',
            ];    
            $data = $request->validate($rules, $messages);  
            $update_category['name'] = $request->name;  
              
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
            


            
            $user= Listingtype::where('id',$id)->update($update_category);
            return redirect('admin/listing-type')->with('message','Listing Type updated successfully.');
            
        }
        $category=Listingtype::where(['id'=>$id])->first();
        return view('admin.list.editlistingtype',compact('category'));
    }


    public function deletelistingtypeList(Request $request ,$id=0)
    {
        $user=Listingtype::where(['id'=>$id])->delete();
        
        return \Redirect::back();
    }



   

    public function activeInactiveListing(Request $request ,$id)
    {
       $check_satus=Listingtype::where('id',$id)->first();
       if($check_satus->is_active == 1){
          $check_satus=Listingtype::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/listing-type')->with('message','Listing Type Inactivated successfully');
       }else{
          $check_satus=Listingtype::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/listing-type')->with('message','Listing Type activated successfully');
       }
       
    }
}
