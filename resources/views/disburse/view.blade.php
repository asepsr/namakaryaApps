@extends('layouts.master')
<style>
    body {
        margin-top: 20px;
        color: #484b51;
    }

    .text-secondary-d1 {
        color: #728299 !important;
    }

    .page-header {
        margin: 0 0 1rem;
        padding-bottom: 1rem;
        padding-top: .5rem;
        border-bottom: 1px dotted #e2e2e2;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-align: center;
        align-items: center;
    }

    .page-title {
        padding: 0;
        margin: 0;
        font-size: 1.75rem;
        font-weight: 300;
    }

    .brc-default-l1 {
        border-color: #dce9f0 !important;
    }

    .ml-n1,
    .mx-n1 {
        margin-left: -.25rem !important;
    }

    .mr-n1,
    .mx-n1 {
        margin-right: -.25rem !important;
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1.5rem !important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .text-grey-m2 {
        color: #888a8d !important;
    }

    .text-success-m2 {
        color: #86bd68 !important;
    }

    .font-bolder,
    .text-600 {
        font-weight: 600 !important;
    }

    .text-110 {
        font-size: 110% !important;
    }

    .text-blue {
        color: #888a8d !important;
    }

    .pb-25,
    .py-25 {
        padding-bottom: .75rem !important;
    }

    .pt-25,
    .py-25 {
        padding-top: .75rem !important;
    }

    .bgc-default-tp1 {
        background-color: rgba(121, 169, 197, .92) !important;
    }

    .bgc-default-l4,
    .bgc-h-default-l4:hover {
        background-color: #f3f8fa !important;
    }

    .page-header .page-tools {
        -ms-flex-item-align: end;
        align-self: flex-end;
    }

    .btn-light {
        color: #757984;
        background-color: #f5f6f9;
        border-color: #dddfe4;
    }

    .w-2 {
        width: 1rem;
    }

    .text-120 {
        font-size: 120% !important;
    }

    .text-primary-m1 {
        color: #4087d4 !important;
    }

    .text-danger-m1 {
        color: #dd4949 !important;
    }

    .text-blue-m2 {
        color: #68a3d5 !important;
    }

    .text-150 {
        font-size: 150% !important;
    }

    .text-60 {
        font-size: 60% !important;
    }

    .text-grey-m1 {
        color: #0055ff !important;
    }

    .align-bottom {
        vertical-align: bottom !important;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Debitur</h4>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-8 d-flex">
            <div class="card card-body flex-fill">
                <div class="page-content container">
                    <div class="page-header text-blue-d2">
                        <h1 class="page-title text-secondary-d1">
                            <small class="page-info">
                                No. Debitur: {{ $debitur->noDebitur }}
                            </small>
                        </h1>

                        <div class="page-tools">
                            <div class="action-buttons">
                                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                    Print
                                </a>
                                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                    Export
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="container px-0">
                        <div class="row mt-4">
                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center text-150">
                                            <h4><span class="text-default-d3">Bukti Pencairan Kredit</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->

                                <hr class="row brc-default-l1 mx-n1 mb-4" />

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div>
                                            <span class="text-sm text-grey-m2 align-middle">Nama Debitur:</span>
                                            <span
                                                class="text-600 text-110 text-blue align-middle">{{ $debitur->name }}</span>
                                        </div>
                                        <div class="text-grey-m2">
                                            <div class="my-1">
                                                Plafond : Rp. {{ number_format($fasilitas->plafondRekomendasi) }}
                                            </div>
                                            <div class="my-1">
                                                Jangka Waktu : {{ $debitur->jwk }} Bulan
                                            </div>
                                            <div class="my-1">
                                                Angsuran : Rp. {{ number_format($angsuran) }} /Bulan
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="text-95 col-sm-7 align-self-start d-sm-flex justify-content-end">
                                        <hr class="d-sm-none" />
                                        <div class="text-grey-m2">

                                            <div class="my-2">
                                                <span class="text-600 text-90">
                                                    No SPK :
                                                </span>
                                                00069SMRNKK0523
                                            </div>
                                            <div class="my-2">
                                                <span class="text-600 text-90">Tgl Approve:</span>
                                                {{ $tglDisburs }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <hr>
                                <div class="mt-4">
                                    <div class="row text-300 text-white bgc-default-tp1 py-25">
                                        <div class="d-none d-sm-block col-1">#</div>
                                        <div class="col-9 col-sm-5">Biaya</div>
                                        <div class="col-2">Nominal</div>
                                    </div>
                                    <hr>

                                    <div class="text-95 text-secondary-d3">
                                        <div class="row mb-2 mb-sm-0 py-25">
                                            <div class="d-none d-sm-block col-1">1</div>
                                            <div class="col-9 col-sm-5">Biaya Bunga</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->bunga, 2) }} %
                                            </div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25">
                                            <div class="d-none d-sm-block col-1">2</div>
                                            <div class="col-9 col-sm-5">Biaya Provisi</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->provisi) }}</div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25">
                                            <div class="d-none d-sm-block col-1">3</div>
                                            <div class="col-9 col-sm-5">Biaya Administrasi</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->admin) }}</div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">4</div>
                                            <div class="col-9 col-sm-5">Biaya Asuransi</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->asuransi) }}0</div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">5</div>
                                            <div class="col-9 col-sm-5">Biaya Notaris</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->notaris) }}</div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">6</div>
                                            <div class="col-9 col-sm-5">Simpanan Pokok</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->simpPokok) }}
                                            </div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">7</div>
                                            <div class="col-9 col-sm-5">Simpanan Wajib</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->simpWajib) }}
                                            </div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">8</div>
                                            <div class="col-9 col-sm-5">Tabungan</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->tabungan) }}</div>
                                        </div>
                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">9</div>
                                            <div class="col-9 col-sm-5">Hold Angsuran</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->hold) }}</div>
                                        </div>

                                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                            <div class="d-none d-sm-block col-1">10</div>
                                            <div class="col-9 col-sm-5">Materai</div>
                                            <div class="col-2 text-secondary-d2">{{ number_format($data->materai) }}</div>
                                        </div>
                                    </div>

                                    <div class="row border-b-2 brc-default-l2"></div>

                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-4 text-grey-d2 text-95 mt-2 mt-lg-0">
                                            Extra note such as company or payment information...
                                        </div>

                                        <div class="col-12 col-sm-8 text-grey text-90 order-first order-sm-last">
                                            <div class="row my-2">
                                                <div class="col-6 text-right">
                                                    Jumlah Biaya
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-120 text-secondary-d1">Rp.
                                                        {{ number_format($jmlBiaya) }}</span>
                                                </div>
                                            </div>

                                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                <div class="col-6 text-right">
                                                    Jumlah Diberikan
                                                </div>
                                                <div class="col-6">
                                                    <span
                                                        class="text-150 text-success-d3 opacity-2">{{ number_format($cair) }}</span>
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
    </div>
@endsection
@push('scripts')
    <script>
        var myBlob;

        $('.btn').click(function() {
            doc.fromHTML($('#content').html(), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
            myBlob = doc.save('blob');
        });
    </script>
@endpush
