<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;

// use Spatie\Permission\Models\Permission;
use App\Permission;
use DB;












class RoleController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    // function __construct()

    // {

    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    // }


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $roles = Role::orderBy('id','DESC')->paginate(5);
        
        return view('admin.roles.index',compact('roles'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $permissions = Permission::get();

        return view('admin.roles.create',compact('permissions'));

    }


    public function store(Request $request)

    {

        $rules = [
            'name'=>'required',
            
        ];
        $messages = [
            'name.required' => 'Please enter role.',
            
        ];    
        $data = $request->validate($rules, $messages);           
    $form_data = array(
            'name' => $request->name,
);
           Role::create($form_data);
           return \Redirect::back();

    }
    
    public function deleteRole(Request $request ,$id=0)
    {

        $user=Role::where(['id'=>$id])->delete();
        return \Redirect::back();
    }    

    public function editRole(Request $request ,$id=0)
    {
        
      
      if($request->isMethod('post')){
          //  dd($request->all());
           
          $rules = [
            'name'=>'required',
            
        ];
        $messages = [
            'name.required' => 'Please enter role.',
            
        ];    
        $data = $request->validate($rules, $messages);           
           
            $update_user['name'] = $request->name;  
               
            // $update_user['dob'] = $request->dob;  
            // if($request->file('image')){
            //     $path = Storage::putFile('public/user_images', $request->file('image'));
            //     $update_user['image'] = Storage::url($path);; 
            // }
           
            $roles= Role::where('id',$id)->update($update_user);
            if($roles){
                return redirect('admin/role-list')->with('message','Role updated successfully.');
            }
        }
        $roles=Role::where(['id'=>$id])->first();
        return view('admin.roles.edit',compact('roles'));
    }
}