<?php

namespace App\Http\Controllers;

use App\DataTables\JabatanDataTable;
use App\Http\Requests\JabatanRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
        public function __construct()
        {
            $this->middleware('can:create jabatan')->only('create');
            $this->middleware('can:edit jabatan')->only('edit');
            $this->middleware('can:update jabatan')->only('update');
            $this->middleware('can:delete jabatan')->only('delete');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JabatanDataTable $dataTable)
    {
        $this->authorize('read jabatan');
        return $dataTable->render('jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.jabatan-action',['jabatan'=>new Jabatan()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanRequest $request)
    {
        Jabatan::create($request->all());
        return response()->json([
        'status'=>'success',
        'message'=>'Data berhasil di tambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.jabatan-action',compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->name =$request->name;
        $jabatan->divisi =$request->divisi;
        $jabatan->save();

        return response()->json([
            'status'=>'sucsses',
            'message'=>'Data Berhasil di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
         $jabatan->delete();
         return response()->json([
         'status'=>'success',
         'message'=>'Data berhasil dihapus'
         ]);
    }
}
