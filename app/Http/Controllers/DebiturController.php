<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebiturRequest;
use App\Http\Requests\HasilRequest;
use App\Models\AccountOfficer;
use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Fasilitas;
use App\Models\History;
use App\Models\Keputusan;
use App\Models\Mitra;
use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Yajra\DataTables\DataTables;

class DebiturController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create debitur')->only('create');
        $this->middleware('can:edit debitur')->only('edit');
        $this->middleware('can:update debitur')->only('update');
        $this->middleware('can:delete debitur')->only('delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read pengajuan pinjaman');
        if ($request->ajax()) {


            $data = Debitur::orderBy('id', 'DESC')->get();
            $cabang = auth()->user()->cabang_id;
            $mitra = auth()->user()->mitra_id;

            if ($cabang == !null) {
                $debitur = $data->where('cabang_id', $cabang);
            } elseif ($mitra == !null) {
                $debitur = $data->where('mitra_id', $mitra);
            } else {
                $debitur = $data;
            }

            // dd($debitur);

            return DataTables::of($debitur)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('D MMMM YYYY');
                    return $formatedDate;
                })
                ->editColumn('tglPengajuan', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d', $data->tglPengajuan)->isoFormat('D MMMM YYYY');
                    return $formatedDate;
                })
                ->addColumn('action', function ($row) {

                    if (Gate::allows('update debitur')) {

                        $btn = '<a href="debitur/' . $row->id . '" data-toggle="tooltip" data-id="' . $row->id . '"
            data-original-title="view" class="edit btn btn-info btn-sm viewdebitur"><i class="mdi mdi-information-outline"></i></a>';
                    }

                    if (Gate::allows('delete debitur')) {
                        $btn .= ' <a href="debitur/' . $row->id . '/downloadberkas" data-toggle="tooltip" data-id="' . $row->id . '"
                data-original-title="Edit"
                class="edit btn btn-success btn-sm editdebitur"><i class="mdi mdi-download"></i></a>';
                    }
                    if (Gate::allows('update debitur')) {

                        $btn .= ' <a href="debitur/' . $row->id . '/edit" data-toggle="tooltip" data-id="' . $row->id . '"
                data-original-title="Edit"
                class="edit btn btn-primary btn-sm editdebitur"><i class="fa fa-pencil"></i></a>';
                    }

                    if (Gate::allows('delete debitur')) {
                        $btn .= ' <a type="button" data-id=' . $row->id . ' data-jenis="delete"
            class="btn btn-danger btn-sm action"><i class="fa fa-trash"></i></a>';
                    }

                    return $btn;
                })

                ->editColumn('status', function ($data) {

                    if (Gate::allows('read status')) {
                        $cekfasilitas = '<a href="debitur/' . $data->id . '/pengajuanMitra" data-toggle="tooltip" data-id="' . $data->id . '"
                        class="edit btn btn-success btn-sm ">Pengajuan Mitra</a>';

                        $cekfasilitas .= ' <a href="debitur/' . $data->id . '/download" data-toggle="tooltip" data-id="' . $data->id . '"
                        class="edit btn btn-primary btn-sm ">Download Berkas</a>';

                        $hasil = ' <a href="debitur/' . $data->id . '/hasilMitra" data-toggle="tooltip" data-id="' . $data->id . '"
                        class="edit btn btn-success btn-sm ">Hasil Fasiltas</a>';

                        if ($data->status == null) {
                            return $cekfasilitas;
                        } elseif ($data->status == 1) {
                            return '<h5><span class="badge badge-info">Proses Mitra</span></h5>';
                        } elseif ($data->status == 2) {
                            return $hasil;
                        } elseif ($data->status == 3) {
                            return '<h5><span class="badge badge-success">Approve Fasilitas</span></h5>';
                        } elseif ($data->status == 4) {
                            return '<h5><span class="badge badge-danger">Reject Fasilitas</span></h5>';
                        } elseif ($data->status == 5) {
                            return '<h5><span class="badge badge-info">Proses Akad Kredit</span></h5>';
                        }
                    } elseif (Gate::allows('read status cabang')) {

                        $akad = ' <a href="disbursement/' . $data->id . '/downloadberkas" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editdebitur"><i class="mdi mdi-download"></i></a>';
                        $akad .= ' <a href="#" class="edit btn btn-warning btn-sm ">Input Akad Kredit</a>';
                        if ($data->status == null) {
                            return '<h5><span class="badge badge-info">Proses Pusat</span></h5>';
                        } elseif ($data->status == 1) {
                            return '<h5><span class="badge badge-info">Proses Mitra</span></h5>';
                        } elseif ($data->status == 2) {
                            return '<h5><span class="badge badge-info">Proses Pusat</span></h5>';
                        } elseif ($data->status == 3) {
                            return '<h5><span class="badge badge-success">Approve Fasilitas</span></h5>';
                        } elseif ($data->status == 4) {
                            return '<h5><span class="badge badge-danger">Reject Fasilitas</span></h5>';
                        } elseif ($data->status == 5) {
                            return $akad;
                        }
                    } elseif (Gate::allows('read status mitra')) {
                        if ($data->status == 0) {
                            return '<h5><span class="badge badge-info">Proses Pusat</span></h5>';
                        } elseif ($data->status == 1) {
                            return '<h5><span class="badge badge-info">cek fasilitas</span></h5>';
                        }
                    }
                })

                ->editColumn('cabang_id', function ($data) {
                    return $data->cabang->name;
                })
                ->editColumn('perusahaan_id', function ($data) {
                    return $data->perusahaan->namaPerusahaan;
                })
                ->editColumn('perusahaan_id', function ($data) {
                    return $data->perusahaan->namaPerusahaan;
                })
                ->editColumn('accountOfficer_id', function ($data) {
                    return $data->accountofficer->name;
                })
                ->editColumn('plafond', function ($data) {
                    return number_format($data->plafond);
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('debiturs.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomor_anggota = $this->generateNomorAnggota();
        $user_id = Auth()->user()->cabang_id;
        $cabang = Cabang::all()->where('id', $user_id);
        $account = AccountOfficer::all()->where('cabang_id', $user_id);
        $perusahaan = Perusahaan::all()->where('cabang_id', $user_id);

        return view('debiturs.create', compact('cabang', 'nomor_anggota', 'account', 'perusahaan'));
    }

    private function generateNomorAnggota()
    {
        // Generate nomor registrasi, misalnya dengan format "REG-yyyymmdd-xxx", di mana "xxx" adalah nomor urut
        return 'REG' . (auth()->user()->cabang_id) . date('md') . str_pad(Debitur::count() + 1, 6, 0, STR_PAD_LEFT);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DebiturRequest $request)
    {

        $debitur = Debitur::create([
            'user_id' => auth()->user()->id,
            'cabang_id' => $request->cabang_id,
            'mitra_id' => $request->mitra_id,
            'accountOfficer_id' => $request->accountOfficer_id,
            'perusahaan_id' => $request->perusahaan_id,
            'name' => $request->name,
            'tglPengajuan' => $request->tglPengajuan,
            'noDebitur' => $request->noDebitur,
            'noKtp' => $request->noKtp,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'plafond' => $request->plafond,
            'jwk' => $request->jwk,
            'ibuKandung' => $request->ibuKandung,
            'tmptLahir' => $request->tmptLahir,
            'tglLahir' => $request->tglLahir,
            'namaPasangan' => $request->namaPasangan,
            'tglLahirPasangan' => $request->tglLahirPasangan,
            'pendidikan' => $request->pendidikan,
            'statusKawin' => $request->statusKawin,
            'npwp' => $request->npwp,
            'domisili' => $request->domisili,
            'stsTinggal' => $request->stsTinggal,
            'jenisPekerjaan' => $request->jenisPekerjaan,
            'lamaBekerja' => $request->lamaBekerja,
            'gaji' => $request->gaji,
        ]);

        foreach ($request->input('document', []) as $file) {

            $debitur->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }

        return redirect('debitur')->with('success', 'Data berhasil di simpan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Debitur::find($id);

        $fasilitas = DB::table('fasilitas')
            ->join('debiturs', 'fasilitas.debitur_id', '=', 'debiturs.id')
            ->join('mitras', 'fasilitas.mitra_id', '=', 'mitras.id')
            ->join('cabangs', 'fasilitas.cabang_id', '=', 'cabangs.id')
            ->select('fasilitas.*', 'debiturs.name as namaDebitur', 'cabangs.name as namaCabang', 'mitras.name as namaMitra')
            ->where('fasilitas.debitur_id', $id)
            ->get();

        return view('debiturs.view',  compact('data', 'fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Debitur::find($id);
        $cabang = Cabang::all();
        $account = AccountOfficer::all();
        $perusahaan = Perusahaan::all();
        return view('debiturs.edit', compact('data', 'cabang', 'account', 'perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DebiturRequest $request, $id)
    {

        $debitur =  Debitur::findOrFail($id);
        $debitur->update($request->all());


        if ($request->input('document', []) == !null) {
            $debitur->clearMediaCollection('document');
            foreach ($request->input('document', []) as $file) {
                $debitur->addMedia(storage_path('tmp/uploads/' .
                    $file))->toMediaCollection('document');
            }
        }

        return redirect('debitur')->with('success', 'Data Berhasil Di Update');
    }

    public function download(Debitur $debitur, $id)
    {
        $debitur = Debitur::findOrFail($id);
        $imagesToDownload = $debitur->getMedia('document');
        return MediaStream::create($debitur->name . '.zip')->addMedia($imagesToDownload);
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
            return redirect('debitur');
        }
    }

    public function pengajuanMitra($id)
    {
        $data = Debitur::find($id);
        $cabang = Cabang::all();
        $accountofficer = AccountOfficer::all();
        $perusahaan = Perusahaan::all();
        $mitra = Mitra::all();
        $mitra2 = Mitra::all();
        return view('debiturs.pengajuanMitra', compact('data', 'cabang', 'accountofficer', 'perusahaan', 'mitra', 'mitra2'));
    }

    public function ajukan(Request $request, $id)
    {
        // dd($request);
        $data = Debitur::find($id);
        $data['status'] = 1;
        $data->save();

        foreach ($request->mitra as $key => $mitra_id) {
            $randomNumber = random_int(1000, 9999);
            $nextAnggotaNumber = $randomNumber + 1;
            $noFasilitas =  str_pad($nextAnggotaNumber, 6, '0', STR_PAD_LEFT);
            $mitras['mitra_id']     = $mitra_id;
            $mitras['user_id']      = $request->user_id[$key];
            $mitras['debitur_id']   = $request->debitur_id[$key];
            $mitras['cabang_id']    = $request->cabang_id[$key];
            $mitras['noFasilitas']   = $noFasilitas;
            // dd($mitras);

            Fasilitas::create($mitras);
        }

        return redirect('debitur')->with('success', 'Data berhasil di simpan!');
    }

    public function hasilMitra($id)
    {

        $data = DB::table('fasilitas')
            ->join('debiturs', 'fasilitas.debitur_id', '=', 'debiturs.id')
            ->join('mitras', 'fasilitas.mitra_id', '=', 'mitras.id')
            ->select('fasilitas.*', 'debiturs.name', 'mitras.name as namaMitra', 'fasilitas.updated_at as updateFasilitas')
            ->where('fasilitas.debitur_id', $id)
            ->get();

        // $data = Fasilitas::with('debitur', 'mitra')->get();

        return view('debiturs.hasilmitra', compact('data'));
    }

    public function updateFasilitas(Request $request, $noFasilitas)
    {

        // dd($request);
        if (!$request->ajax()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $fasilitas = Fasilitas::where('noFasilitas', $noFasilitas)->first();


        if (!$fasilitas) {
            return response()->json(['message' => 'Fasilitas not found'], 404);
        }

        $fasilitas->status = $request->input('status');

        if ($request->status == 2) {
            $fasilitas->fasilitas = '3';
        }
        $fasilitas->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function kirim(HasilRequest $request, $id)
    {
        try {
            $debitur = Debitur::find($id);

            $debitur->keterangan = $request->keterangan;

            if ($request->sttApprovel == 1) {
                $debitur->status = '3';
            } elseif ($request->sttApprovel == 2) {
                $debitur->status = '4';
            }
            $debitur->save();

            return redirect('debitur')->with('success', 'Data dikirim cabang!');
        } catch (\Throwable $e) {

            return redirect('debitur')->with('error', 'Data gagal Terkirim');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debitur $debitur)
    {
        $debitur->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function trash()
    {
        $this->authorize('read trash');
        $debitur = Debitur::onlyTrashed()->paginate(10);
        return view('trash', ['debitur' => $debitur]);
    }

    public function restore($id)
    {
        $user = Debitur::withTrashed()->findOrFail($id);
        if ($user->trashed()) {

            $user->restore();

            return redirect()->route('trash')->with('success', 'Data successfully restored');
        } else {

            return redirect()->route('trash')->with('success', 'Data is not in trash');
        }
    }

    public function deletePermanent($id)
    {
        $user = Debitur::withTrashed()->findOrFail($id);
        if (!$user->trashed()) {
            return redirect()->route('trash')->with('success', 'Data is noting trash!');
        } else {
            $user->forceDelete();
            return redirect()->route('trash')->with('success', 'Data permanently deleted!');
        }
    }
}
