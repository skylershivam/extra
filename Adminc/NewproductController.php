<?php


namespace App\Http\Controllers;


use App\Newproduct;

use Illuminate\Http\Request;


class NewproductController extends Controller

{ 

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:Newproduct-list|Newproduct-create|Newproduct-edit|Newproduct-delete', ['only' => ['index','show']]);

         $this->middleware('permission:Newproduct-create', ['only' => ['create','store']]);

         $this->middleware('permission:Newproduct-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:Newproduct-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $Newproducts = Newproduct::latest()->paginate(5);

        return view('Newproducts.index',compact('Newproducts'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('Newproducts.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);


        Newproduct::create($request->all());


        return redirect()->route('Newproducts.index')

                        ->with('success','Newproduct created successfully.');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Newproduct  $Newproduct

     * @return \Illuminate\Http\Response

     */

    public function show(Newproduct $Newproduct)

    {

        return view('Newproducts.show',compact('Newproduct'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Newproduct  $Newproduct

     * @return \Illuminate\Http\Response

     */

    public function edit(Newproduct $Newproduct)

    {

        return view('Newproducts.edit',compact('Newproduct'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Newproduct  $Newproduct

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Newproduct $Newproduct)

    {

         request()->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);


        $Newproduct->update($request->all());


        return redirect()->route('Newproducts.index')

                        ->with('success','Newproduct updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Newproduct  $Newproduct

     * @return \Illuminate\Http\Response

     */

    public function destroy(Newproduct $Newproduct)

    {

        $Newproduct->delete();


        return redirect()->route('Newproducts.index')

                        ->with('success','Newproduct deleted successfully');

    }

}