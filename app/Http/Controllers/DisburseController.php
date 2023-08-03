<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Debitur;
use App\Models\Disbursement;
use App\Models\Fasilitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\Support\MediaStream;

class DisburseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read disbursement');
        if ($request->ajax()) {

            $mitra_id = auth()->user()->mitra_id;

            $debitur = Debitur::select(
                'debiturs.*',
                'fasilitas.fasilitas',
                'fasilitas.id as s',
                'fasilitas.noFasilitas',
                'fasilitas.updated_at as tglApprove',
                'fasilitas.plafondRekomendasi as plafondApprove',
                'debiturs.tglPengajuan as tglPengajuan'
            )
                ->join('fasilitas', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereIN('debiturs.status', [3, 5])
                ->orderBy('tglPengajuan', 'DESC');

            if ($mitra_id == !null) {
                $debitur->where('debiturs.mitra_id', '=', $mitra_id);
            } else {
                $debitur->get();
            }

            $data = $debitur->get();


            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<a href="disbursement/' . $row->id . '" data-toggle="tooltip" data-id="' . $row->id . '"data-original-title="view" class="edit btn btn-info btn-sm viewdebitur"><i class="mdi mdi-information-outline"></i></a>';
                    $btn .= ' <a href="disbursement/' . $row->id . '/downloadberkas" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editdebitur"><i class="mdi mdi-download"></i></a>';

                    return $btn;
                })


                ->editColumn('status', function ($data) {
                    $btn = '<a href="disbursement/' . $data->id . '/edit" data-toggle="tooltip" data-id="' . $data->id . '"
                    data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Disbursement</a>';

                    if (Gate::allows('read status')) {
                        if ($data->status == 3) {
                            return '<h5><span class="badge badge-info">Proses Disburse Mitra</span></h5>';
                        } elseif ($data->status == 5) {
                            return '<h5><span class="badge badge-info">Proses Akad Kredit</span></h5>';
                        }
                    } elseif (Gate::allows('read status mitra')) {
                        if ($data->status == 3) {
                            return  $btn;
                        } elseif ($data->status == 5) {
                            return '<h5><span class="badge badge-info">Proses Akad Kredit</span></h5>';
                        }
                    }
                })

                ->editColumn('cabang_id', function ($data) {
                    return $data->cabang->name;
                })

                ->editColumn('tglApprove', function ($row) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->tglApprove)->isoFormat('D MMMM YYYY');
                    return $formatedDate;
                })

                ->editColumn('tglPengajuan', function ($row) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d', $row->tglPengajuan)->isoFormat('D MMMM YYYY');
                    return $formatedDate;
                })

                ->editColumn('mitra_id', function ($data) {
                    return $data->mitra->name;
                })
                ->editColumn('plafondApprove', function ($data) {
                    return number_format($data->plafondApprove);
                })

                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('disburse.index');
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'NoSpk'         => 'required',
            'angsuran'      => 'required',
            'bunga'         => 'required',
            'admin'         => 'required',
            'provisi'       => 'required',
            'simpPokok'     => 'required',
            'simpWajib'     => 'required',
            'tabungan'      => 'required',
        ]);

        $disbursement = Disbursement::create([
            'debitur_id'    => $request->debitur_id,
            'tglDisburs'    => $request->tglDisburs,
            'NoSpk'         => $request->NoSpk,
            'angsuran'      => $request->angsuran,
            'bunga'         => $request->bunga,
            'admin'         => $request->admin,
            'provisi'       => $request->provisi,
            'asuransi'      => $request->asuransi,
            'notaris'       => $request->notaris,
            'simpPokok'     => $request->simpPokok,
            'simpWajib'     => $request->simpWajib,
            'tabungan'      => $request->tabungan,
            'hold'          => $request->hold,
            'materai'       => $request->materai,
            'biayaLainya'   => $request->biayaLainya,
            'status'        => '1',
        ]);

        foreach ($request->input('spk', []) as $file) {

            $disbursement->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('spk');
        }

        $debitur =  Debitur::findOrFail($request->debitur_id);
        $debitur->status = '5';
        $debitur->save();

        return redirect('disbursement')->with('success', 'Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $debitur = Debitur::find($id);
        $data = Disbursement::with('debitur')->where('debitur_id', $id)->first();
        $fasilitas = Fasilitas::with('debitur')->where('debitur_id', $id)->first();

        if (empty($data->debitur)) {
            Alert::error('Biaya Belum Diisi');
            return redirect('disbursement');
        } else {

            $jmlBiaya = $data['bunga'] + $data['provisi'] + $data['admin'] + $data['asuransi'] + $data['notaris'] + $data['simpPokok'] + $data['simpWajib'] + $data['tabungan'] + $data['hold'] + $data['materai'];


            $angsuran = ($fasilitas['plafondRekomendasi'] * ($data['bunga'] / 100)) + ($fasilitas['plafondRekomendasi'] / $debitur['jwk']);

            $cair = $fasilitas['plafondRekomendasi'] - $jmlBiaya;

            $date = $data->tglDisburs;

            $tglDisburs = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d M Y');
        }

        return view('disburse.view', compact('data', 'debitur', 'jmlBiaya', 'fasilitas', 'angsuran', 'cair', 'tglDisburs'));
    }

    public function downloadberkas($id)
    {
        $disburs = Disbursement::where('debitur_id', $id)->first();
        if ($disburs == null) {
            Alert::error('Dokument tidak di temukan');
            return redirect('disbursement');
        }
        $download = Disbursement::find($disburs->id);
        $media = $download->getFirstMedia('spk');

        if ($media) {
            // Jika gambar ada, lakukan proses download
            $imagesToDownload = $download->getMedia('spk');
            return MediaStream::create('SPKNO' . $download->id . '.zip')->addMedia($imagesToDownload);
        } else {
            // Jika gambar tidak ada, berikan tanggapan sesuai kebutuhan
            Alert::error('Dokument tidak di temukan', 'Belum ada berkas yang di upload');
            return redirect('disbursement');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $debitur = Debitur::find($id);
        $fasilitas = Fasilitas::all()->where('debitur_id', $id)->first();


        return view('disburse.edit', compact('debitur', 'fasilitas'));
    }

    public function getdata(Request $request)
    {
        // dd($request);
        $data = Biaya::where('namaBiaya', $request->namaBiaya)->first();
        return response()->json($data);
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
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
