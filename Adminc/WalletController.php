<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\wallet;
class WalletController extends Controller
{
    public function Wallet(Request $request)
    {
       
       
       $permissions = wallet::get();
       return view('admin.users.',compact(['users','permissions']));
    }
}
