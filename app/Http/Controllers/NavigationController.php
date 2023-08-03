<?php

namespace App\Http\Controllers;

use App\DataTables\NavigationDataTable;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
        public function __construct()
        {
            $this->middleware('can:create menu')->only('create');
            $this->middleware('can:edit menu')->only('edit');
            $this->middleware('can:update menu')->only('update');
            $this->middleware('can:delete menu')->only('destroy');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NavigationDataTable $datatable)
    {
        $this->authorize('read menu');
        return $datatable->render('menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('menu.menu-action',['menu'=>new Navigation()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
