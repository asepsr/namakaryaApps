<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Fasilitas;
use App\Models\Perusahaan;
use App\Models\Slik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ErrorHandler\Debug;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cabang = auth()->user()->cabang_id;
        $mitra_id = auth()->user()->mitra_id;

        if ($mitra_id >= 1) {
            $debCount = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->where('fasilitas.mitra_id', $mitra_id)
                ->get(['debiturs.*', 'debiturs.id'])->count('id');

            $plafond = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->where('fasilitas.mitra_id', $mitra_id)
                ->where('fasilitas.status', '1')
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');

            $pencairan = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereIn('fasilitas.status2', [1])
                ->where('fasilitas.mitra_id', $mitra_id)
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');

            $pending = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereNotIn('fasilitas.fasilitas', [2, 4])
                ->where('fasilitas.mitra_id', $mitra_id)
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');
        } elseif ($cabang >= 1) {

            $debCount = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->where('fasilitas.cabang_id', $cabang)
                ->where('fasilitas.status2', '1')
                ->get(['debiturs.*', 'debiturs.id'])->count('id');

            $plafond = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->where('fasilitas.cabang_id', $cabang)
                ->where('fasilitas.status2', '1')
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');

            $pencairan = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereIn('fasilitas.status2', [1])
                ->where('fasilitas.cabang_id', $cabang)
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');

            $pending = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereNotIn('fasilitas.fasilitas', [2, 4])
                ->where('fasilitas.cabang_id', $cabang)
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');
        } elseif ($cabang >= 0) {
            $debCount = Debitur::count();

            $plafond = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->where('fasilitas.status2', '1')
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');

            $pencairan = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereIn('fasilitas.status2', [1])
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');

            $pending = Fasilitas::join('debiturs', 'debiturs.id', '=', 'fasilitas.debitur_id')
                ->whereNotIn('fasilitas.fasilitas', [2, 4])
                ->get(['debiturs.*', 'fasilitas.plafondRekomendasi'])->sum('plafondRekomendasi');
        }

        return view('home', compact('debCount', 'plafond', 'pencairan', 'pending'));
    }
}
