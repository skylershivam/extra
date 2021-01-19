<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;



class PermissionController extends Controller
{
    public function index(Request $request)
    {
       
      $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }

    
    public function create()
    {
        
      
      return view('admin.permission.create');
    }

    public function editPermission(Request $request ,$id=0)
    {
        
      
      if($request->isMethod('post')){
          //  dd($request->all());
             
          $rules = [
            'name'=>'required',
            
        ];
        $messages = [
            'name.required' => 'Please enter Permission.',
            
        ];    
        $data = $request->validate($rules, $messages);     
           
            $update_user['name'] = $request->name;  
            
               
            // $update_user['dob'] = $request->dob;  
            // if($request->file('image')){
            //     $path = Storage::putFile('public/user_images', $request->file('image'));
            //     $update_user['image'] = Storage::url($path);; 
            // }
           
            $products= Permission::where('id',$id)->update($update_user);
            if($products){
                return redirect('admin/permission-list')->with('message','Permission updated successfully.');
            }
        }
        $permissions=Permission::where(['id'=>$id])->first();
        return view('admin.permission.edit',compact('permissions'));
    }
    
    
    
    
    public function store(Request $request)

    {

      $rules = [
        'name'=>'required',
        
    ];
    $messages = [
        'name.required' => 'Please enter name.',
        
    ];    
    $data = $request->validate($rules, $messages);     
      
      
      $form_data = array(
            'name' => $request->name,
            );
           Permission::create($form_data);

        
        
        return \Redirect::back();

                        

    }
    

    public function deletePermission(Request $request ,$id=0)
    {
       
        $products=Permission::where(['id'=>$id])->delete();
        return \Redirect::back();
    }    
}
