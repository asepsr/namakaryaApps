<?php

namespace App\Http\Controllers;

use App\DataTables\PerusahaanDataTables;
use App\Http\Requests\PerusahaanRequest;
use App\Models\Cabang;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{

        public function __construct()
        {
        $this->middleware('can:create perusahaan')->only('create');
        $this->middleware('can:delete perusahaan')->only('destory');
        $this->middleware('can:update perusahaan')->only('update');
        $this->middleware('can:update perusahaan')->only('edit');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PerusahaanDataTables $dataTable)
    {
        $this->authorize('read perusahaan');
        return $dataTable->render('perusahaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = Cabang::all();
        return view('perusahaan.perusahaan-action',['perusahaan'=>new Perusahaan()],compact('cabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerusahaanRequest $request)
    {
        Perusahaan::create($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>'Data berhasil di tambahkan'
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
    public function edit(Perusahaan $perusahaan)
    {
        $cabang = Cabang::all();
        return view('perusahaan.perusahaan-action',compact('perusahaan','cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerusahaanRequest $request, Perusahaan $perusahaan)
    {
        $perusahaan->mitraPekerja =$request->mitraPekerja; 
        $perusahaan->kopkar =$request->kopkar;
        $perusahaan->noPks =$request->noPks;
        $perusahaan->tglPks =$request->tglPks;
        $perusahaan->lamaPks =$request->lamaPks;
        $perusahaan->namaPerusahaan =$request->namaPerusahaan;
        $perusahaan->metodeAngsuran =$request->metodeAngsuran;
        $perusahaan->namaPic =$request->namaPic;
        $perusahaan->jabatanPic =$request->jabatanPic;
        $perusahaan->contactPic =$request->contactPic;
        $perusahaan->cabang_id =$request->cabang_id;
        $perusahaan->save();

         return response()->json([
         'status'=>'sucsses',
         'message'=>'Data Berhasil di Update'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
            return response()->json([
            'status'=>'success',
            'message'=>'Data berhasil dihapus'
          ]);
    }
}
