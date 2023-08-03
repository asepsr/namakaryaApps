@extends('layouts.master')

<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card m-b-30 card-body">
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h4>History Pengajuan</h4>
                            <ul class="timeline">
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Cabang Namastra Bogor</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Pengajuan Kredit</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p> kirim pengajuan slik</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Bank Mitra</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Proses Slik</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>hasil slik kirim cabang</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Cabang Namastra Bogor</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Kirim proses input fasilitas</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Proses Fasilitas Ceking</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Pangajuan kredit/Fasilitas Approve</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body ">
                            <div class="col-12 mb-3">
                                <center>
                                    <h3> DATA PENGAJUAN FASILITAS PINJAMAN</h3>
                                </center>
                            </div>
                            <br>
                            <hr />
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active " id="basicInfo-tab" data-toggle="tab"
                                                                href="#basicInfo" role="tab" aria-controls="basicInfo"
                                                                aria-selected="true">DATA
                                                                PRIBADI</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab"
                                                                href="#connectedServices" role="tab"
                                                                aria-controls="connectedServices" aria-selected="false">DATA
                                                                PENGAJUAN</a>
                                                        </li>
                                                        @can('read debitur')
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="hasil-tab" data-toggle="tab"
                                                                    href="#hasil" role="tab" aria-controls="hasil"
                                                                    aria-selected="false">HASIL
                                                                    PENGAJUAN</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                    <div class="tab-content ml-1" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="basicInfo"
                                                            role="tabpanel" aria-labelledby="basicInfo-tab">


                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nama
                                                                        Debitur</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->name }}
                                                                </div>
                                                            </div>
                                                            <hr />

                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nomor Ktp</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->noKtp }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Tempat
                                                                        Lahir</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->tmptLahir }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Tanggal
                                                                        Lahir</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ date('d F Y', strtotime($data->tglLahir)) }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nama Ibu
                                                                        Kandung</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->ibuKandung }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Telepon</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->tlp }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Alamat</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->alamat }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nama
                                                                        Pasangan</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->namaPasangan }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Tanggal Lahir
                                                                        Pasangan</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ date('d F Y', strtotime($data->tglLahirPasangan)) }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Pendidikan</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->pendidikan }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nomor NPWP</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->npwp }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Status
                                                                        Kawin</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->statusKawin }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nama
                                                                        Perusahaan</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->perusahaan->namaPerusahaan }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Lama
                                                                        Bekerja</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->lamaBekerja }} Tahun
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                        <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                                            aria-labelledby="ConnectedServices-tab">
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Nomor
                                                                        Debitur</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->noDebitur }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Tanggal
                                                                        Pengajuan</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ date('d-m-Y', strtotime($data->tglPengajuan)) }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Account
                                                                        Officer</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->accountofficer->name }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Cabang
                                                                        Pengajuan</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{ $data->cabang->name }}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-6 col-md-4 col-5">
                                                                    <label style="font-weight:bold;">Status
                                                                        Fasilitas</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    @if ($data->status == 1)
                                                                        <h5><span class="badge badge-info">On Prosess
                                                                                Fasilitas</span></h5>
                                                                    @elseif($data->status == 2)
                                                                        <h5><span
                                                                                class="badge badge-success">Pending</span>
                                                                        </h5>
                                                                    @elseif($data->status == 3)
                                                                        <h5><span class="badge badge-success">Approve
                                                                                Fasilitas</span></h5>
                                                                    @elseif($data->status == 4)
                                                                        <h5><span class="badge badge-success">Reject
                                                                                Fasilitas</span></h5>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @can('read debitur')
                                                            <div class="tab-pane fade" id="hasil" role="tabpanel"
                                                                aria-labelledby="hasil-tab">
                                                                @foreach ($fasilitas as $data)
                                                                    <div class="card card-body mb-3">
                                                                        <div style="font-size: 25px ">
                                                                            <b>{{ $data->namaMitra }}</b>
                                                                        </div>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Kode Fasilitas</th>
                                                                                    <td>
                                                                                        @if ($data->noFasilitas == !null)
                                                                                            {{ $data->noFasilitas }}
                                                                                        @else
                                                                                            Data Pending
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">kolektibilitas
                                                                                        debitur
                                                                                    </th>
                                                                                    <td>
                                                                                        @if ($data->statusKolek == !null)
                                                                                            {{ $data->statusKolek }}
                                                                                        @else
                                                                                            Data Pending
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Hasil Slik</th>
                                                                                    <td>
                                                                                        @if ($data->slik == !null)
                                                                                            {{ $data->slik }}
                                                                                        @else
                                                                                            Data Pending
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Plafond disetujui
                                                                                    </th>
                                                                                    <td>
                                                                                        @if ($data->plafondRekomendasi == !null)
                                                                                            {{ $data->plafondRekomendasi }}
                                                                                        @else
                                                                                            Data Pending
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Keterangan</th>
                                                                                    <td>
                                                                                        @if ($data->note == !null)
                                                                                            {{ $data->note }}
                                                                                        @else
                                                                                            Data Pending
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Fasilitas diperiksa
                                                                                        Mitra</th>
                                                                                    <td>
                                                                                        @if ($data->fasilitas == !null)
                                                                                            @if ($data->fasilitas == 1)
                                                                                                <h5><span
                                                                                                        class="badge badge-success">Approve
                                                                                                        Fasilitas</span>
                                                                                                </h5>
                                                                                            @elseif($data->fasilitas == 2)
                                                                                                <h5><span
                                                                                                        class="badge badge-danger">Reject
                                                                                                        Fasilitas</span>
                                                                                                </h5>
                                                                                            @elseif($data->fasilitas == 3)
                                                                                                <h5><span
                                                                                                        class="badge badge-danger">Batal
                                                                                                        Fasilitas</span>
                                                                                                </h5>
                                                                                            @endif
                                                                                        @else
                                                                                            <h5><span
                                                                                                    class="badge badge-warning">Data
                                                                                                    Pending</span></h5>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Fasilitas diperiksa
                                                                                        Namastra</th>
                                                                                    <td>
                                                                                        @if ($data->status == !null)
                                                                                            @if ($data->fasilitas == 1)
                                                                                                <h5><span
                                                                                                        class="badge badge-success">Approve
                                                                                                        Fasilitas</span>
                                                                                                </h5>
                                                                                            @elseif($data->fasilitas == 2)
                                                                                                <h5><span
                                                                                                        class="badge badge-danger">Reject
                                                                                                        Fasilitas</span>
                                                                                                </h5>
                                                                                            @elseif($data->fasilitas == 3)
                                                                                                <h5><span
                                                                                                        class="badge badge-danger">Batal
                                                                                                        Fasilitas</span>
                                                                                                </h5>
                                                                                            @endif
                                                                                        @else
                                                                                            <h5><span
                                                                                                    class="badge badge-warning">Data
                                                                                                    Pending</span></h5>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endcan
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
            </div> <!-- end row -->
        </div>
    </div>
@endsection
