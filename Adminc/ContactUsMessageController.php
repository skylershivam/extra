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
use App\Admin;
use App\ContactUsMessage;
use App\NewsletterEmail;

use Carbon\Carbon;
use DB;
class ContactUsMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }	
     

    public function ContactUsList(Request $request)
    {
       $contact_messages = ContactUsMessage::orderBy('id','Desc')->with('user')->get();
       //echo $contact_messages;die();
       return view('admin.contact_us_messages.contact-us-list',compact('contact_messages'));
    }

     public function newsLetterEmails(Request $request)
    {
       $newsletter_emails = NewsletterEmail::orderBy('id','Desc')->get();
       //echo $contact_messages;die();
       return view('admin.contact_us_messages.newsletter-emails',compact('newsletter_emails'));
    }

   

    

    

 
   
}
