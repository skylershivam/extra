<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Hash;
use Redirect;
use Storage;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }	
     
    public function postsList(Request $request)
    {
        
        $posts = Post::with('user','subCategory.category','vehicle')->orderBy('id','desc')->get();
        //echo $posts;die();
        return view('admin.posts.posts-list',compact('posts'));
    }


	
    public function viewPost(Request $request ,$id)
    {
        $post = Post::with('user','subCategory.category','images','vehicle')->where(['id'=>$id])->orderBy('id','desc')->first();
        //echo $post;die();
        return view('admin.posts.view-post',compact('post'));
    }

   
    public function activeInactivePost(Request $request ,$id)
    {
       $is_active=Post::where('id',$id)->first();
       if($is_active->is_active == 1){
          $is_active=Post::where('id',$id)->update(['is_active'=>2]);
          return redirect('admin/posts-list')->with('message','Post inactivaed successfully');
       }else{
          $is_active=Post::where('id',$id)->update(['is_active'=>1]);
          return redirect('admin/posts-list')->with('message','Post activated successfully');
       }
       
    }

   
   


   

   
}
