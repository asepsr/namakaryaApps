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
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-8 d-flex">
            <div class="card card-body flex-fill">
                <div class="page-content container">
                    <div class="container px-0">
                        <div class="row mt-4">
                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center text-150">
                                            <h4><span class="text-default-d3">Form Akad Kredit</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->

                                <hr class="row brc-default-l1 mx-n1 mb-4" />

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-grey-m2">
                                            <div class="my-2">
                                                <span class="text-600 text-90">
                                                    Nama Debitur :
                                                </span>
                                                {{ $debitur->name }}
                                            </div>
                                            <div class="my-2">
                                                <span class="text-600 text-90">
                                                    Plafond :
                                                </span>
                                                Rp. {{ number_format($fasilitas->plafondRekomendasi) }}
                                            </div>
                                            <div class="my-2">
                                                <span class="text-600 text-90">
                                                    Jangka Waktu :
                                                </span>
                                                {{ $debitur->jwk }} Bulan
                                            </div>
                                            <div class="my-2">
                                                <span class="text-600 text-90">
                                                    Angsuran :
                                                </span>
                                                Rp. {{ number_format($angsuran) }} /Bulan
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
                                            <div class="my-2">
                                                <span class="text-600 text-90">No Fasilitas:</span>
                                                {{ $fasilitas->noFasilitas }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="row mb-3">
                                        <div class="col-lg-12 d-flex">
                                            <div class="card card-body flex-fill">
                                                <form method="post"
                                                    action="{{ route('debitur.revisiakad', $fasilitas->noFasilitas) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Note
                                                            Revisi</label>
                                                        <div class="col-sm-12">
                                                            <textarea id="domisili" value="{{ old('keterangan') }}" name="keterangan"
                                                                class="form-control @error('keterangan') is-invalid @enderror" maxlength="500" rows="8" placeholder=""></textarea>
                                                            @error('keterangan')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <div>
                                                            <button type="submit"
                                                                class="btn btn-warning waves-effect waves-light">
                                                                Revisi
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="post" action="{{ route('debitur.approveakad', $data->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group m-b-0">
                                                        <div>
                                                            <button type="submit"
                                                                class="btn btn-success waves-effect waves-light">
                                                                Approve
                                                            </button>
                                                            <button type="reset"
                                                                class="btn btn-secondary waves-effect m-l-5">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
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
