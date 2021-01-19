<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reportstype;
class ReportstypeController extends Controller
{
    public function reportstypeList(Request $request)
    {
        
        $reports = Reportstype::all();
        return view('admin.reports.reportstype',compact('reports'));
    }


    public function addreportstypeList(Request $request)
    {
        if($request->isMethod('post')){
          //  dd($request->all());
            $rules = [
                'name'=>'required|unique:categories,name|min:3|max:255',
                //'name'=>'unique:categories,name',
            ];
            $messages = [
                'name.required' => 'Please enter report name.',
                'name.unique' => 'Report name already exists.',
            ];    
            $data = $request->validate($rules, $messages);  
            $report_type['name'] = $request->name;  
            $rport_type['created_at'] = Date('Y-m-d H:i'); 
          /*  if($request->file('image')){
                $path = Storage::putFile('public/category_images', $request->file('image'));
                $save_category['image'] = Storage::url($path);; 
            }*/
            $report= Reportstype::insert($report_type);
            return redirect('admin/reports-type')->with('message','Report Type added successfully.');
            
        }

        return view('admin.reports.reportstype');
    }


}
