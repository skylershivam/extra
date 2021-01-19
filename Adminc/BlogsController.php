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
use App\Blog;
use Carbon\Carbon;
use DB;
class BlogsController extends Controller
{
    public function __construct()
    {
       $this->middleware('admin');
    }	
     

    public function BlogsList(Request $request)
    {
       $blogs=Blog::orderBy('id','Desc')->get();
       return view('admin.blogs.blogs-list',compact('blogs'));
    }
   
    public function editBlog(Request $request ,$id=0)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
          $rules = [
            'blog'=>'required',
            'image'=>'required',
            'title'=>'required',
           
        ];
        $messages = [
            'blog.required' => 'Please enter blog.',
            'image.required' => 'Please selec image.',
            'title.required' => 'Please enter title.',
            
        ];    
        $data = $request->validate($rules, $messages);
            if($request->file('image')){ 
                $image = $request->file('image');
                $new_name = rand().'.'.$image->
                getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);  
             } 
            
            
           
            $update_blog['blog'] = trim($request->blog);  
            $update_blog['title'] = $request->title;
            if(isset($new_name)){
            $update_blog['image'] = $request->$new_name; 
            }
            $user= Blog::where('id',$id)->update($update_blog);
            return redirect('admin/blogs-list')->with('message','Blog updated successfully.');
            
        }
        $blog=Blog::where(['id'=>$id])->first();
        return view('admin.blogs.edit-blog',compact('blog'));
    }


    public function viewBlog(Request $request ,$id=0)
    {
        
        $blog=Blog::where(['id'=>$id])->first();
        return view('admin.blogs.view-blog',compact('blog'));
    }

     
    public function addBlog(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'blog'=>'required',
                'image'=>'required',
                'title'=>'required',
                
            ];
            $messages = [
                'blog.required' => 'Please enter blog.',
                'image.required' => 'Please selec image.',
                'title.required' => 'Please enter title.',
               
            ];    
            
            $data = $request->validate($rules, $messages);  
            $image = $request->file('image');
         
            $new_name = rand().'.'.$image->
            getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            
            
            
           

            
            
            $save_blog['title'] = $request->title; 
            $save_blog['blog'] = $request->blog;  
            $save_blog['image'] = $new_name;
          
            $save_blog['created_at'] = Date('Y-m-d H:i'); 
         
            $user= Blog::insert($save_blog);
            return redirect('admin/blogs-list')->with('message','Blog added successfully.');
            
        }
        return view('admin.blogs.add-blog');
    }

          
    public function deleteBlog(Request $request ,$id=0)
    {
       
        $products=Blog::where(['id'=>$id])->delete();
        return \Redirect::back();
    }     

}
