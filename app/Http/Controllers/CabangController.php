<?php

namespace App\Http\Controllers;

use App\DataTables\CabangDataTables;
use App\Http\Requests\CabangRequest;
use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create cabang')->only('create');
        $this->middleware('can:delete cabang')->only('destory');
        $this->middleware('can:update cabang')->only('update');
        $this->middleware('can:update cabang')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CabangDataTables $dataTable)
    {
        $this->authorize('read cabang');
        return $dataTable->render('cabang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabang.cabang-action', ['cabang' => new Cabang()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CabangRequest $request)
    {
        Cabang::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil di tambahkan'
        ]);
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
    public function edit(Cabang $cabang)
    {
        return view('cabang.cabang-action', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CabangRequest $request, Cabang $cabang)
    {
        $cabang->name = $request->name;
        $cabang->tlp = $request->tlp;
        $cabang->alamat = $request->alamat;
        $cabang->save();

        return response()->json([
            'status' => 'sucsses',
            'message' => 'Data Berhasil di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabang $cabang)
    {
        $cabang->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
