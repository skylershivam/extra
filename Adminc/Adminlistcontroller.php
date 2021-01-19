<?php

namespace App\Http\Controllers\Admin;

use App\Adminlist;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class AdminlistController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $data = Adminlist::orderBy('id','DESC')->paginate(5);

        return view('admin.Adminlists.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::pluck('name','name')->all();

        return view('Adminlists.create',compact('roles'));

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function Adminlist(Request $request)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:Adminlists,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);


        $input = $request->all();

        $input['password'] = Hash::make($input['password']);


        $Adminlist = Adminlist::create($input);

        $Adminlist->assignRole($request->input('roles'));


        return redirect()->route('Adminlists.index')

                        ->with('success','Adminlist created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $Adminlist = Adminlist::find($id);

        return view('Adminlists.show',compact('Adminlist'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $Adminlist = Adminlist::find($id);

        $roles = Role::pluck('name','name')->all();

        $AdminlistRole = $Adminlist->roles->pluck('name','name')->all();


        return view('Adminlists.edit',compact('Adminlist','roles','AdminlistRole'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:Adminlists,email,'.$id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);


        $input = $request->all();

        if(!empty($input['password'])){ 

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = array_except($input,array('password'));    

        }


        $Adminlist = Adminlist::find($id);

        $Adminlist->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $Adminlist->assignRole($request->input('roles'));


        return redirect()->route('Adminlists.index')

                        ->with('success','Adminlist updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Adminlist::find($id)->delete();

        return redirect()->route('Adminlists.index')

                        ->with('success','Adminlist deleted successfully');

    }

}