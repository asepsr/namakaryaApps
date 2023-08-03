<?php

namespace App\Http\Controllers;

use App\DataTables\MitraDataTable;
use App\Http\Requests\MitraRequest;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create mitra')->only('create');
        $this->middleware('can:edit mitra')->only('edit');
        $this->middleware('can:update mitra')->only('update');
        $this->middleware('can:delete mitra')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MitraDataTable $dataTable)
    {
        $this->authorize('read mitra');
        return $dataTable->render('mitra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitra.mitra-action', ['mitra' => new Mitra()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MitraRequest $request)
    {
        Mitra::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil di tambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        return view('mitra.mitra-action', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(MitraRequest $request, Mitra $mitra)
    {
        $mitra->name = $request->name;
        $mitra->tlp = $request->tlp;
        $mitra->alamat = $request->alamat;
        $mitra->save();

        return response()->json([
            'status' => 'sucsses',
            'message' => 'Data Berhasil di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        $mitra->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
