<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Mail\AdminPasswordEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\User;
use Validator;
use Hash;
use Illuminate\Support\Facades\Mail;



class LoginController extends Controller
{
    

    public function LogIn(Request $request)
    {
        //die('ok2');
        return view('admin.login');
    }

     public function LoginUser_old(Request $request)
    {
    
        $rules = [
            'email'     => 'required|email|exists:admin,email',
            'password'  => 'required'
        ];

        $messages = [
            'email' => 'Please enter a registered email address',
            'password.required' => 'Please enter a password',
        ];
        // dd($request->all());
         $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required'
            ],$messages);
        
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


        $data = $request->validate($rules, $messages);
      // dd($request->email);
         $chk_admin = User::where(['email'=>$request->email])->first();
      // dd($chk_admin);
         if($chk_admin){


         if(Hash::check($request->password, $chk_admin->password)) {
        //$user = auth()->guard('user')->attempt($data);
    //  if(!empty($user)){
            Session::put('admin','1');
                return redirect()->route('admin.dashboard');
         }else{
            return Redirect('admin/')->with('message','Please enter a valid email address or password');
        }
        
        }else{
            return Redirect('admin/')->with('message','Please enter a valid email address or password');
        }
        
    }

     public function LoginUser(Request $request)
    {
    
        $rules = [
            'email'     => 'required|email|exists:admin,email',
            'password'  => 'required'
        ];

        $messages = [
            'email' => 'Please enter a registered email address',
            'password.required' => 'Please enter a password',
        ];
        // dd($request->all());
         $validator = Validator::make($request->all(), [
            'email'     => 'required|email|exists:admin,email',
            'password'  => 'required'
            ],$messages);
        
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


        $data = $request->validate($rules, $messages);
        $user = auth()->guard('admin')->attempt($data);
        
        if(!empty($user)){
            //dd(Auth::guard('admin')->user());
            if(Auth::guard('admin')->user()->role == 1){
                $email = $request->email;
                
                $time['login']=date('Y-m-d H:i:s');
                
        
                $admins= Admin::where('email',$email)->update($time);
                $logout= Admin::where('email',$email)->update(['logout' => null]);
                $update_status= Admin::where('email',$email)->update(['status' => 'active' ]);
                return redirect()->route('admin.dashboard');
            }elseif (Auth::guard('admin')->user()->role == 2) {
                return redirect()->route('admin.dashboard-company');
            }    
        }else{
            return Redirect('admin/')->with('message','Please enter a valid email address or password');
        }
        
    }

    

    public function forgotPassword(Request $request)
    {
       if($request->isMethod('Post')){
             $messages = [
                'email.required' => 'Please enter a email address.',
                'email.exists' => 'Email not exist.',
                
            ];    
             
            $validator = Validator::make($request->all(), [
                'email'=>'required|exists:admin|email',
               
            ],$messages );
        
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $email=$request->email;
            $admin = Admin::where('email',$email)->first();
            if($admin){
                //$update_admin = new Admin();
                //$update_admin->exists = true;
                //$update_admin->email = $email; 
                $update_admin['reset_password_link'] = '?token='.str_random(64);
                //$update_admin->save();
                Admin::where('email',$email)->update($update_admin);
               // dd($update_admin);
                $admin = Admin::where('email',$email)->first();
                Mail::to($email)->send(new AdminPasswordEmail($admin));
                return redirect()->back()->with('message','Email has been send to your email address');
            }
            
        }
        return view('admin.forgot-password');
    }


   public function resetPassword(Request $request)   //for admin
    {
       
       //$dd=explode('/',$request->url());
       $token = '?token='.$request->query('token');
        if($request->isMethod('post')){
       
        $messages = [
            'new_password.required' => 'Please enter a new password.',
            'confirm_password.required' => 'Please enter a confirm password.',
        ];    
         
        $validator = Validator::make($request->all(), [
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:new_password',
        ],$messages );
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $token = $request->reset_password_link;
        $password = Hash::make($request->new_password);

        $user= Admin::where('reset_password_link',$token)->update(['password'=>$password,'reset_password_link'=>'']);
        if($user){
            return redirect('admin/')->with('message','Password has been changed successfully.');
        }

        }else{
           
            $user= Admin::where('reset_password_link',$token)->first();   
            if(empty($user)){
              return redirect()->route('admin.message')->with('message','Link has been expired.');  
            }
            return view('admin.reset-password',compact('token'));    
        } 
        
    }

    public function resetPasswordUser(Request $request)   //for user
    {
        $token = '?token='.$request->query('token');
        if($request->isMethod('post')){
        $messages = [
            'new_password.required' => 'Please enter a new password.',
            'confirm_password.required' => 'Please enter a confirm password.',
        ];    
         
        $validator = Validator::make($request->all(), [
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:new_password',
        ],$messages );
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
          $token = $request->reset_password_link;
          $password      =  Hash::make($request->new_password);
          $user= User::where('reset_password_link',$token)->update(['password'=>$password,'reset_password_link'=>'']);
          return redirect()->route('admin.message')->with('message','Password has been changed successfully.');
        }else{
            $user= User::where('reset_password_link',$token)->first();   
            if(empty($user)){
              return redirect()->route('admin.message')->with('message','Link has been expired.');  
            }
            return view('admin.reset-password',compact('token'));
        } 
       
    }

    public function pageNotFound(Request $request)
    {
      //  die('dsfsf');
        return view('emails.page-not-found');
    }

    
  
    public function logout(Request $request ,$id=0)
    {
        
        $time['logout']=date('Y-m-d H:i:s');
        $id = $request->id;
        
        $admins= Admin::where('id',$id)->update($time);
        $update_status= Admin::where('id',$id)->update(['status' => 'inactive' ]);
        //auth()->guard('admin')->logout();
        session()->flush();
        return redirect('/');
    }
}
