@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Analis</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{ route('analis.store') }}">
                @csrf
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" id="debitur_id" name="debitur_id" class="form-control" hidden>
                                    <input type="text" id="fasilitas_id" name="fasilitas_id" class="form-control" hidden>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="name">Nomor Debitur</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <input type="text" id="noDebitur" name="noDebitur"
                                                    value="{{ $data->noDebitur }}"
                                                    class="form-control @error('debitur_id') is-invalid @enderror"
                                                    placeholder="Search nomor debitur" readonly>
                                                @error('debitur_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nomor Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noFasilitas" name="noFasilitas"
                                                value="{{ $data->noFasilitas }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nama Debitur</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaDebitur" name="namaDebitur"
                                                value="{{ $data->name }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Tempat Lahir</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="tmpLahir" name="tmpLahir"
                                                value="{{ $data->tmpLahir }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="date" id="tglLahir" name="tglLahir"
                                                value="{{ $data->tglLahir }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nama Perusahaan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaPerusahaan" name="namaPerusahaan"
                                                value="{{ $data->namaPerusahaan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Plafond</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="plafond" name="plafond"
                                                value="{{ number_format($data->plafond) }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Alamat Perusahaan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <textarea id="alamatPerusahaan" name="alamatPerusahaan" class="form-control" maxlength="225" rows="3"
                                                placeholder="" readonly>{{ $analis->alamatPerusahaan }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="lastname">Tanggal Mpp</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="date" value="{{ $analis->tglMpp }}" id="tglMpp"
                                                name="tglMpp" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Jenis Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="jenisFasilitas" name="jenisFasilitas"
                                                value="{{ $analis->jenisFasilitas }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor Surat</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noSurat" name="noSurat"
                                                value="{{ $analis->noSurat }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Tujuan Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="tujuanFasilitas" name="tujuanFasilitas"
                                                value="{{ $analis->tujuanFasilitas }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Area Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-control" id="cabang" name="cabang_id" readonly>
                                                <option value="">---Select---</option>
                                                @foreach ($cabang as $cabang)
                                                    <option value="{{ $cabang->id }}"
                                                        {{ $cabang->id == $analis->cabang_id ? 'selected' : '' }}>
                                                        {{ $cabang->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Lending Officer</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaLo" name="namaLo"
                                                value="{{ $analis->namaLo }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Collection</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaCollection" name="namaCollection"
                                                value="{{ $analis->namaCollection }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Team Leader</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaTl" name="namaTl"
                                                value="{{ $analis->namaTl }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Penghasilan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="pengasilan" name="pengasilan"
                                                value="{{ number_format($data->penghasilan) }}" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Rate Bunga</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="rate" name="rate"
                                                value="{{ $analis->rate }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="email">%</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Tenor</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="tenor" name="tenor"
                                                value="{{ $analis->tenor }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="email">Tahun</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor Kontrak</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noKontrak" name="noKontrak"
                                                value="{{ $analis->noKontrak }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Data Jaminan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="dataJaminan" name="dataJaminan"
                                                value="{{ $analis->dataJaminan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor BPJS</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noBPJS" name="noBPJS"
                                                value="{{ $analis->noBpjs }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Saldo BPJS</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="saldoBpjs" name="saldoBpjs"
                                                value="{{ $analis->saldoBpjs }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Jenis Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="jenisPengajuan" name="jenisPengajuan"
                                                value="{{ $analis->jenisPengajuan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Deskripsi</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="deskripsi" name="deskripsi"
                                                value="{{ $analis->deskripsi }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 class="mt-0 header-title mb-3"> Aktif / pinjaman awal</h5>
                                    <div class="table-responsive">
                                        <table id="tablebankloan" class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Nama Bank</th>
                                                    <th>Plafond</th>
                                                    <th>Outstanding</th>
                                                    <th>Cicilan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bankloan1 as $bankloan1)
                                                    <tr>
                                                        <td>{{ $bankloan1->bankName }}</td>
                                                        <td>Rp.{{ number_format($bankloan1->loan) }}</td>
                                                        <td>Rp.{{ number_format($bankloan1->outstanding) }}</td>
                                                        <td>Rp.{{ number_format($bankloan1->angsuran) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="table-secondary"><b>Total</b></td>
                                                    <td class="table-secondary">
                                                        <b>Rp.{{ number_format($total['totLoan']) }}</b>
                                                    </td>
                                                    <td class="table-secondary">
                                                        <b>Rp.{{ number_format($total['totOs']) }}</b>
                                                    </td>
                                                    <td class="table-secondary">
                                                        <b>Rp.{{ number_format($total['totAngsuran']) }}</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br />
                                        <h5 class="mt-0 header-title mb-3"> Pinjaman Baru Setelah Disetujui</h5>
                                        <table id="tablebankloan" class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Nama Bank</th>
                                                    <th>Plafond</th>
                                                    <th>Outstanding</th>
                                                    <th>Cicilan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bankloan2 as $bankloan2)
                                                    <tr>
                                                        <td>{{ $bankloan2->bankName }}</td>
                                                        <td>Rp.{{ number_format($bankloan2->loan) }}</td>
                                                        <td>Rp.{{ number_format($bankloan2->outstanding) }}</td>
                                                        <td>Rp.{{ number_format($bankloan2->angsuran) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="table-secondary"><b>Total</b></td>
                                                    <td class="table-secondary">
                                                        <b>Rp.{{ number_format($total3['totLoan3']) }}</b>
                                                    </td>
                                                    <td class="table-secondary">
                                                        <b>Rp.{{ number_format($total3['totOs3']) }}</b>
                                                    </td>
                                                    <td class="table-secondary">
                                                        <b>Rp.{{ number_format($total3['totAngsuran3']) }}</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="mt-0 header-title mb-3"> Baru Setelah Disetujui</h5>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-4">
                                            <label for="email">Total Angsuran Pijaman Awal :</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            Rp. {{ number_format($total['totAngsuran']) }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-4">
                                            <label for="email">Total Angsuran Baru Namastra :</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            Rp. {{ number_format($total2['totAngsuran']) }}
                                        </div>
                                    </div>
                                    <hr class="hr" />
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-4">
                                            <label for="email" style="color:red">Terjadi Kenaikan / Penurunan Angsuran
                                                sebesar :</label>
                                        </div>
                                        <div class="col-12 col-md-8" style="color: red">
                                            Rp. {{ number_format($subTot['subTotal']) }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-4">
                                            <label for="email" style="color: red">Persentase :</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label style="color: red">
                                                {{ number_format((float) $subTot2['subPersen'] . 2) }}
                                                %</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="text-center">
                                <h2 class="mt-0 header-title">ANALISA KEMAMPUAN MEMBAYAR ANGSURAN</h2>
                            </div>
                            <hr class="hr" />
                            <div class="text-center">
                                <div class="row grid-col">
                                    <div class="col-md-12 mx-auto">
                                        <div class="row nested-col">
                                            <div class="col-sm-6">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-4">
                                                        <label for="email" style="color: blue">Total Angsuran Saat ini
                                                            :</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label style="color: blue"> Rp.
                                                            {{ number_format($total2['totAngsuran']) }}</label>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">IIR (Installment to
                                                                Income Ratio)</label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">Rp.
                                                                {{ number_format($iir['iirTotal']) }}<label> -->Total
                                                                    Angsuran
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">=
                                                                ---------------------------------------------<label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">Rp.
                                                                {{ number_format($analis->hasilLain) }}<label>
                                                                    -->penghasilan lain
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">=
                                                                {{ number_format((float) $iir2['iirhasil'] . 2) }}%<label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-8">
                                                        <label for="email" style="color: blue">Saldo BPJS:</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label style="color: blue"> Rp.
                                                            {{ number_format($analis->saldoBpjs) }}</label>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">LTV { Loan To Value
                                                                }</label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">Rp.
                                                                {{ number_format($data->plafond) }}<label> --> Palfond
                                                                    Pengajuan
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">=
                                                                ---------------------------------------------<label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue">Rp.
                                                                {{ number_format($analis->saldoBpjs) }}<label> --> Saldo
                                                                    BPJS
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label for="email" style="color: blue"> =
                                                                {{ number_format((float) $ltv['ltvtotal'] . 2) }}%<label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <hr class="hr" />
                                                <div class="text-center">
                                                    <div class="col-12 col-md-12">
                                                        <label>Hasil Kesimpulan Analis<label>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <label for="email" style="color: blue">
                                                            <h1>{{ $result }}</h1><label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> <!-- end col -->
    </form>
    </div>
@endsection
@push('scripts')
@endpush
