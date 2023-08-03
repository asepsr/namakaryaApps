<?php

namespace App\Http\Controllers;

use App\DataTables\BiayaDataTables;
use App\Http\Requests\BiayaRequest;
use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BiayaDataTables $dataTable)
    {
        return $dataTable->render('biaya.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biaya.biaya-action', ['biaya' => new Biaya()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BiayaRequest $request)
    {
        Biaya::create($request->all());
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
    public function edit(Biaya $biaya)
    {
        return view('biaya.biaya-action', compact('biaya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Biaya $biaya, BiayaRequest $request)
    {
        $biaya->namaBiaya = $request->namaBiaya;
        $biaya->bunga = $request->bunga;
        $biaya->provisi = $request->provisi;
        $biaya->admin = $request->admin;
        $biaya->asuransi = $request->asuransi;
        $biaya->notaris = $request->notaris;
        $biaya->simpPokok = $request->simpPokok;
        $biaya->simpWajib = $request->simpWajib;
        $biaya->tabungan = $request->tabungan;
        $biaya->hold = $request->hold;
        $biaya->materai = $request->materai;
        $biaya->save();

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
    public function destroy(Biaya $biaya)
    {
        $biaya->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function trashBiaya()
    {
        $this->authorize('read trash');
        $biaya = Biaya::onlyTrashed()->paginate(10);
        return view('trashBiaya', ['biaya' => $biaya]);
    }

    public function restoreBiaya($id)
    {
        $user = Biaya::withTrashed()->findOrFail($id);
        if ($user->trashed()) {

            $user->restore();

            return redirect()->route('trash')->with('success', 'Data successfully restored');
        } else {

            return redirect()->route('trash')->with('success', 'Data is not in trash');
        }
    }

    public function deletePermanentBiaya($id)
    {
        $user = Biaya::withTrashed()->findOrFail($id);
        if (!$user->trashed()) {
            return redirect()->route('trash')->with('success', 'Data is noting trash!');
        } else {
            $user->forceDelete();
            return redirect()->route('trash')->with('success', 'Data permanently deleted!');
        }
    }
}
