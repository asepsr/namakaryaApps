<?php

namespace App\Http\Controllers;

use App\Http\Requests\CekRequest;
use App\Models\Debitur;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\Support\MediaStream;
use Yajra\DataTables\DataTables;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read fasilitas');
        if ($request->ajax()) {

            $mitra = auth()->user()->mitra_id;


            $data = Debitur::select(
                'debiturs.*',
                'fasilitas.fasilitas',
                'fasilitas.id as s',
                'fasilitas.noFasilitas',
            )
                ->join('fasilitas', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->where('fasilitas.mitra_id', $mitra)
                ->orderBy('created_at', 'DESC')
                ->get();


            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = ' <a href="fasilitas/' . $row->id . '/downloadberkas" data-toggle="tooltip" data-id="' . $row->id . '"
                    data-original-title="Edit"
                    class="download btn btn-danger btn-sm download"><i class="mdi mdi-download"></i></a>';

                    $btn .= ' <a href="debitur/' . $row->id . '" data-toggle="tooltip" data-id="' . $row->id . '"
                    data-original-title="view" class="edit btn btn-info btn-sm viewdebitur"><i class="mdi mdi-information-outline"></i></a>';

                    return $btn;
                })

                ->editColumn('fasilitas', function ($data) {
                    $btn = '<a href="fasilitas/' . $data->noFasilitas . '/edit" data-toggle="tooltip" data-id="' . $data->id . '"
                    data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Check Pengajuan</a>';


                    if (empty($data->fasilitas)) {
                        return $btn;
                    } elseif ($data->fasilitas == 1) {
                        return '<h5><span class="badge badge-success">Approve Fasilitas</span></h5>';
                    } elseif ($data->fasilitas == 2) {
                        return '<h5><span class="badge badge-info">Proses Akad namastra</span></h5>';
                    } elseif ($data->fasilitas == 3) {
                        return '<h5><span class="badge badge-danger">Reject Fasilitas</span></h5>';
                    } elseif ($data->fasilitas == 4) {
                        return '<h5><span class="badge badge-danger">Batal Pengajuan</span></h5>';
                    } elseif ($data->fasilitas == 5) {
                        return 'Ceking Akad Namastra';
                    }
                })
                ->editColumn('cabang_id', function ($data) {
                    return $data->cabang->name;
                })
                ->editColumn('plafond', function ($data) {
                    return number_format($data->plafond);
                })

                ->rawColumns(['fasilitas', 'action'])
                ->make(true);
        }

        return view('fasilitas.index');
    }


    public function reject(Request $request, $noFasilitas)
    {

        $data = Fasilitas::find($noFasilitas);
        $data->cabang_id = $request->cabang_id;

        $debitur_id = $data->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->sttsPengajuan = '9';
        $debitur->save();

        return redirect('fasilitas')->with('success', 'Data Berhassil Di simpan!');
    }

    public function downloadberkas($id)
    {
        $debitur = Debitur::find($id);
        $media = $debitur->getFirstMedia('document');

        if ($media) {
            // Jika gambar ada, lakukan proses download
            $imagesToDownload = $debitur->getMedia('document');
            return MediaStream::create($debitur->name . '.zip')->addMedia($imagesToDownload);
        } else {
            // Jika gambar tidak ada, berikan tanggapan sesuai kebutuhan
            Alert::error('Dokument tidak di temukan', 'Belum ada berkas yang di upload');
            return redirect('fasilitas');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($noFasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($noFasilitas)
    {
        $data = Fasilitas::where('noFasilitas', $noFasilitas)->first();

        // dd($data);

        $debitur_id = $data->debitur_id;


        $debitur = Debitur::find($debitur_id);

        return view('fasilitas.cekfasilitas', compact('debitur', 'data'));
    }

    public function approve(CekRequest $request, $noFasilitas)
    {

        $fasilitas =  Fasilitas::where('noFasilitas', $noFasilitas)->first();

        if ($fasilitas) {
            $fasilitas->statusKolek = $request->statusKolek;
            $fasilitas->slik = $request->statusSlik;
            $fasilitas->note = $request->note;
            $fasilitas->fasilitas = $request->fasilitas;

            if ($request->fasilitas == 1) {
                $fasilitas->status = '1';
            }

            // Simpan perubahan pada entitas
            $fasilitas->save();

            $debitur_id = $fasilitas->debitur_id;
            $debitur = Debitur::find($debitur_id);
            $debitur->status = '2';
            $debitur->save();

            $plafond = $debitur->plafond;
            $plafondRekomendasi = $request->plafondRekomendasi;



            if ($plafondRekomendasi == !null) {
                $fasilitas->plafondRekomendasi = $request->plafondRekomendasi;
                $fasilitas->save();
            } else {
                $fasilitas->plafondRekomendasi = $plafond;
                $fasilitas->save();
            }

            return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil diperbarui.');
        } else {
            return redirect()->route('fasilitas.index')->with('error', 'Nomor Fasilitas tidak ditemukan.');
        }

        return redirect('fasilitas')->with('success', 'Data Berhasil Di simpan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $noFasilitas)
    {
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
