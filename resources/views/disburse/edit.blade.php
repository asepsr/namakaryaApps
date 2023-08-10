@extends('layouts.master')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12 d-flex">
            <div class="card card-body flex-fill">
                <div class="page-title-box">
                    <center>
                        <h4 class="page-title">Data Debitur Disbursemnt </h4>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('disbursement.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-4 d-flex">
                <div class="card card-body flex-fill">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nama
                                Debitur</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $debitur->name }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nomor Debitur</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $debitur->noDebitur }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nomor Fasilitas</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $fasilitas->noFasilitas }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">plafond</label>
                        </div>
                        <div class="col-md-8 col-6">
                            Rp. {{ number_format($fasilitas->plafondRekomendasi) }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Jangka Waktu</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $debitur->jwk }} Bulan
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Tanggal Realisasi</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ date('d-m-Y') }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold; color: blue">Jumlah Biaya</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <input class="form-control" type="text" value="" name="jmlBiaya" id="jmlBiaya"
                                disabled>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold; color: blue">Jumlah dibayarkan</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <input class="form-control" type="text" value="" name="bayar" id="bayar"
                                disabled>
                        </div>
                    </div>
                    <hr />
                    <br />
                </div>
            </div>
            <div class="col-lg-4 d-flex">
                <div class="card card-body flex-fill">
                    <input class="form-control" type="text" value="{{ $debitur->id }}" name="debitur_id" id="debitur_id"
                        hidden>
                    <input class="form-control" type="text" value="{{ $fasilitas->noFasilitas }}" name="noFasilitas"
                        id="noFasilitas" hidden>
                    <input class="form-control" type="text" value="{{ date('Y-m-d') }}" name="tglDisburs" id="tglDisburs"
                        hidden>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">No. SPK</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('NoSpk') is-invalid @enderror" type="text"
                                value="{{ old('NoSpk') }}" name="NoSpk" id="NoSpk" onkeyup="myFunction()">
                            @error('NoSpk')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Kewajiban Angsuran
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('angsuran') is-invalid @enderror nominal" type="number"
                                value="{{ old('angsuran') }}" name="angsuran" id="angsuran">
                            @error('NoSpk')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Bunga
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('bunga') is-invalid @enderror tes" type="text"
                                value="{{ old('bunga') }}" name="bunga" id="bunga">
                            @error('bunga')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Provisi
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('provisi') is-invalid @enderror nominal" type="number"
                                value="{{ old('provisi') }}" name="provisi" id="provisi">
                            @error('provisi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Administrasi
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('admin') is-invalid @enderror nominal" type="number"
                                value="{{ old('admin') }}" name="admin" id="admin">
                            @error('admin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Asuransi
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('asuransi') is-invalid @enderror nominal" type="number"
                                value="{{ old('asuransi') }}" name="asuransi" id="asuransi">
                            @error('asuransi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label nominal">Notaris
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('notaris') is-invalid @enderror nominal" type="number"
                                value="{{ old('notaris') }}" name="notaris" id="notaris">
                            @error('notaris')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex">
                <div class="card card-body flex-fill">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Simpanan Pokok
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('simpPokok') is-invalid @enderror nominal" type="number"
                                value="{{ old('simpPokok') }}" name="simpPokok" id="simpPokok">
                            @error('simpPokok')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Simpanan Wajib
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('simpWajib') is-invalid @enderror nominal" type="number"
                                value="{{ old('simpWajib') }}" name="simpWajib" id="simpWajib">
                            @error('simpWajib')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Tabungan
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('tabungan') is-invalid @enderror nominal" type="number"
                                value="{{ old('tabungan') }}" name="tabungan" id="tabungan">
                            @error('tabungan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label nominal">Hold Angsuran
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('hold') is-invalid @enderror" type="number"
                                value="{{ old('hold') }}" name="hold" id="hold">
                            @error('hold')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Materai
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('materai') is-invalid @enderror nominal" type="number"
                                value="{{ old('materai') }}" name="materai" id="materai">
                            @error('materai')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Biaya Lainnya
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control @error('biayaLainya') is-invalid @enderror nominal" type="number"
                                value="{{ old('biayaLainya') }}" name="biayaLainya" id="biayaLainya">
                            @error('biayaLainya')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12 d-flex">
                <div class="card card-body flex-fill">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Upload Surat Perjanjian
                            Kredit</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="needsclick dropzone" id="document-dropzone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        function myFunction() {
            var x = document.getElementById("NoSpk");
            x.value = x.value.toUpperCase();
        }

        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('disbursement.storeMedia') }}',
            maxFilesize: 10, // MB
            acceptedFiles: 'application/pdf,.rar,.zip',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="spk[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="spk[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                        {!! json_encode($project->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="spk[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }

        $(function() {
            $('#provisi,#admin,#asuransi,#notaris,#simpPokok,#simpWajib,#tabungan,#hold,#materai').keyup(
                function() {
                    var value2 = parseFloat($('#provisi').val()) || 0;
                    var value3 = parseFloat($('#admin').val()) || 0;
                    var value4 = parseFloat($('#asuransi').val()) || 0;
                    var value5 = parseFloat($('#notaris').val()) || 0;
                    var value6 = parseFloat($('#simpPokok').val()) || 0;
                    var value7 = parseFloat($('#simpWajib').val()) || 0;
                    var value8 = parseFloat($('#tabungan').val()) || 0;
                    var value9 = parseFloat($('#hold').val()) || 0;
                    var value10 = parseFloat($('#materai').val()) || 0;
                    var value11 = parseFloat($('#biayaLainya').val()) || 0;
                    $('#jmlBiaya').val(value2 + value3 + value4 + value5 + value6 + value7 + value8 +
                        value9 + value10 + value11);
                });
        });
    </script>
@endpush
