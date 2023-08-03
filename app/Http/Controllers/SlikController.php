<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlikRequest;
use App\Models\Debitur;
use App\Models\Mitra;
use App\Models\Slik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class SlikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read slik');
        if ($request->ajax()) {

            $data = Debitur::latest()->get();
            $user = auth()->user()->mitra_id;


            $slik = $data->where('mitra_id', $user)->where('sttsPengajuan', 1);

            return DataTables::of($slik)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if (Gate::allows('update slik')) {

                        $btn = '<a href="slik/' . $row->id . '/cekslik" data-toggle="tooltip" data-id="' . $row->id . '"
              data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Check SLIK</a>';
                    }

                    return $btn;
                })
                ->editColumn('cabang_id', function ($data) {
                    return $data->cabang->name;
                })
                ->editColumn('plafond', function ($data) {
                    return number_format($data->plafond);
                })

                ->rawColumns([])
                ->make(true);
        }

        return view('slik.index');
    }

    public function cekslik(Slik $slik, $id)
    {
        $data = Debitur::find($id);
        $image = $data->getMedia('images');

        return view('slik.cekslik', compact('image', 'data'));
    }



    public function dataslik(Request $request)
    {
        $this->authorize('read slik/dataslik');
        if ($request->ajax()) {


            $data = DB::table('debiturs')
                ->join('sliks', 'debiturs.id', '=', 'sliks.debitur_id')
                ->select('debiturs.*', 'sliks.*')
                ->get();

            $user = auth()->user()->mitra_id;
            $slik = $data->where('mitra_id', $user);

            return DataTables::of($slik)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {

                    if ($data->status == 2) {
                        return '<span class="badge badge-success">Approve</span>';
                    } elseif ($data->status == 3) {
                        return '<span class="badge badge-danger">Recject</span>';
                    }
                })



                ->rawColumns(['status'])
                ->make(true);
        }

        return view('slik.dataslik');
    }


    public function allslik(Request $request)
    {
        $this->authorize('read slik/allslik');
        if ($request->ajax()) {

            $data = DB::table('mitras')
                ->join('debiturs', 'mitras.id', '=', 'debiturs.mitra_id')
                ->join('sliks', 'debiturs.id', '=', 'sliks.debitur_id')
                ->select('debiturs.*', 'sliks.*', 'mitras.name as mitra')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {

                    if ($data->status == 2) {
                        return '<span class="badge badge-success">Approve</span>';
                    } elseif ($data->status == 3) {
                        return '<span class="badge badge-danger">Recject</span>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('slik.allslik');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlikRequest $request, $id)
    {
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
    public function update(SlikRequest $request, Slik $data, $id)
    {

        $debitur = new Debitur();
        $debitur = Debitur::findOrFail($id);
        $debitur->sttsPengajuan = $request->statusSlik;
        $debitur->save();
        $mitraID = $debitur->mitra_id;
        $debiturID = $debitur->id;

        $data = new Slik();
        $data->debitur_id = $debiturID;
        $data->mitra_id = $mitraID;
        $data->tglSlik = $request->get('tglSlik');
        $data->statusKolek = $request->get('statusKolek');
        $data->keterangan = $request->get('keterangan');
        $data->note = $request->get('note');
        $data->status = $request->get('statusSlik');
        $data->save();
        return redirect('slik')->with('success', 'Data Berhasil Di Update');
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
