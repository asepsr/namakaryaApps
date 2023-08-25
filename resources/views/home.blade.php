{{-- @extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@extends('layouts.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Jumlah Debitur</h4>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h3 class="mt-0 round-inner">{{ $debCount }}</h3>
                                <p class="mb-0 text-muted">Total Debitur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-cash-multiple"></i>
                            </div>
                        </div>
                        <div class="col-8 text-center align-self-center">
                            <div>
                                <h5>Rp. {{ number_format($plafond) }}</h5>
                                <p class="mb-0 text-muted">Total Plafond</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col-8 text-center align-self-center">
                            <div>
                                <h5>Rp. {{ number_format($pencairan) }}</h5>
                                <p class="mb-0 text-muted">Total Pencairan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-dns"></i>
                            </div>
                        </div>
                        <div class="col-8 text-center align-self-center">
                            <div>
                                <h5>{{ number_format($pending) }}</h5>
                                <p class="mb-0 text-muted">Total Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        {{-- </div>
    @if (auth()->user()->cabang_id)
        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">PENGAJUAN BARU PERBULAN</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-weight:bold">
                                        <th class="border-top-0">EMC</th>
                                        <th class="border-top-0">KANTOR PERWAKILAN</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">NOMINAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($plafondSums as $plafondSums)
                                        <tr>
                                            <td>{{ $plafondSums->name }}</td>
                                            <td>{{ $plafondSums->cabang }}</td>
                                            <td>{{ $plafondSums->total_debitur }}</td>
                                            <td>Rp. {{ number_format($plafondSums->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $plafondSums->total_plafond;
                                            $subcount += $plafondSums->total_debitur;
                                        @endphp
                                    @endforeach
                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp. {{ number_format($subtotal) }}</td>
                                    </tr>
                                    </td>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">AKUMULASI PENCAPAIAN EMC</h5>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr style="font-weight:bold">
                                        <th class="border-top-0">EMC</th>
                                        <th class="border-top-0">Kantor Perwakilan</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">DISB</th>
                                        <th class="border-top-0">OS</th>
                                        <th class="border-top-0">RR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($pencapaian as $pencapaian)
                                        <tr>
                                            <td>{{ $pencapaian->name }}</td>
                                            <td>{{ $pencapaian->cabang }}</td>
                                            <td>{{ $pencapaian->total_debitur }}</td>
                                            <td>Rp. {{ number_format($pencapaian->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $pencapaian->total_plafond;
                                            $subcount += $pencapaian->total_debitur;
                                        @endphp
                                    @endforeach

                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp.{{ number_format($subtotal) }}</td>
                                        <td>Rp.0</td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">DISB BULAN INI</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Kantor Perwakilan</th>
                                        <th class="border-top-0">SPV</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">DISB</th>
                                        <th class="border-top-0">OS</th>
                                        <th class="border-top-0">RR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($disb as $disb)
                                        <tr>
                                            <td>{{ $disb->cabang }}</td>
                                            <td>{{ $disb->spv }}</td>
                                            <td>{{ $disb->total_debitur }}</td>
                                            <td>Rp. {{ number_format($disb->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $disb->total_plafond;
                                            $subcount += $disb->total_debitur;
                                        @endphp
                                    @endforeach
                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp.{{ number_format($subtotal) }}</td>
                                        <td>Rp.0</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">PEMBIAYAAN DI PERUSAHAAN</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Perusahaan</th>
                                        <th class="border-top-0">Lokasi</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">DISB</th>
                                        <th class="border-top-0">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($disbPerusahaan as $disbPerusahaan)
                                        <tr>
                                            <td>{{ $disbPerusahaan->namaPerusahaan }}</td>
                                            <td>{{ $disbPerusahaan->cabang }}</td>
                                            <td>{{ $disbPerusahaan->total_debitur }}</td>
                                            <td>Rp. {{ number_format($disbPerusahaan->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $disbPerusahaan->total_plafond;
                                            $subcount += $disbPerusahaan->total_debitur;
                                        @endphp
                                    @endforeach
                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp.{{ number_format($subtotal) }}</td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    @elseif(auth()->user()->mitra_id == null)
        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">PENGAJUAN BARU PERBULAN</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-weight:bold">
                                        <th class="border-top-0">EMC</th>
                                        <th class="border-top-0">KANTOR PERWAKILAN</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">NOMINAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($plafondSums as $plafondSums)
                                        <tr>
                                            <td>{{ $plafondSums->name }}</td>
                                            <td>{{ $plafondSums->cabang }}</td>
                                            <td>{{ $plafondSums->total_debitur }}</td>
                                            <td>Rp. {{ number_format($plafondSums->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $plafondSums->total_plafond;
                                            $subcount += $plafondSums->total_debitur;
                                        @endphp
                                    @endforeach
                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp. {{ number_format($subtotal) }}</td>
                                    </tr>
                                    </td>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">AKUMULASI PENCAPAIAN EMC</h5>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr style="font-weight:bold">
                                        <th class="border-top-0">EMC</th>
                                        <th class="border-top-0">Kantor Perwakilan</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">DISB</th>
                                        <th class="border-top-0">OS</th>
                                        <th class="border-top-0">RR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($pencapaian as $pencapaian)
                                        <tr>
                                            <td>{{ $pencapaian->name }}</td>
                                            <td>{{ $pencapaian->cabang }}</td>
                                            <td>{{ $pencapaian->total_debitur }}</td>
                                            <td>Rp. {{ number_format($pencapaian->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $pencapaian->total_plafond;
                                            $subcount += $pencapaian->total_debitur;
                                        @endphp
                                    @endforeach

                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp.{{ number_format($subtotal) }}</td>
                                        <td>Rp.0</td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">DISB BULAN INI</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Kantor Perwakilan</th>
                                        <th class="border-top-0">SPV</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">DISB</th>
                                        <th class="border-top-0">OS</th>
                                        <th class="border-top-0">RR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($disb as $disb)
                                        <tr>
                                            <td>{{ $disb->cabang }}</td>
                                            <td>{{ $disb->spv }}</td>
                                            <td>{{ $disb->total_debitur }}</td>
                                            <td>Rp. {{ number_format($disb->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $disb->total_plafond;
                                            $subcount += $disb->total_debitur;
                                        @endphp
                                    @endforeach
                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp.{{ number_format($subtotal) }}</td>
                                        <td>Rp.0</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        <h5 class="header-title mb-4 mt-0 text-center">PEMBIAYAAN DI PERUSAHAAN</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Perusahaan</th>
                                        <th class="border-top-0">Lokasi</th>
                                        <th class="border-top-0">NOA</th>
                                        <th class="border-top-0">DISB</th>
                                        <th class="border-top-0">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $subcount = 0;
                                    @endphp
                                    @foreach ($disbPerusahaan as $disbPerusahaan)
                                        <tr>
                                            <td>{{ $disbPerusahaan->namaPerusahaan }}</td>
                                            <td>{{ $disbPerusahaan->cabang }}</td>
                                            <td>{{ $disbPerusahaan->total_debitur }}</td>
                                            <td>Rp. {{ number_format($disbPerusahaan->total_plafond) }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $disbPerusahaan->total_plafond;
                                            $subcount += $disbPerusahaan->total_debitur;
                                        @endphp
                                    @endforeach
                                    <tr class="table-info" style="font-weight:bold">
                                        <td colspan="2" class="center">TOTAL</td>
                                        <th scope="row">{{ $subcount }}</th>
                                        <td>Rp.{{ number_format($subtotal) }}</td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    @endif --}}
    @endsection
