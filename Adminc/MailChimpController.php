<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Config;
use Newsletter;

class MailChimpController extends Controller
{
    
  public function manageMailChimp()

    {

        return view('admin.Mail.mailchimp');

    }

    
    public function storemanageMailChimp(Request $request)
    {
        
        $user=Newsletter::subscribe($request->email);
        if($user){
            $user=Newsletter::subscribe($request->email);
            return redirect()->back()->with('message', 'You are Sucessfully Subscribed');
            
            
        }else{
        
        
            return redirect()->back()->with('message', "You are already Subscribed");
        

        } 

}


}
