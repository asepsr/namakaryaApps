@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Input Biaya Disbursemnt</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h3 class="mt-0">
                        <center>Data Debitur</center>
                    </h3>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nama
                                Debitur</label>
                        </div>
                        <div class="col-md-8 col-6">
                            Asep Saypul Rohim
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nomor Debitur</label>
                        </div>
                        <div class="col-md-8 col-6">
                            REG0707000002
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">plafond</label>
                        </div>
                        <div class="col-md-8 col-6">
                            Rp. 40.000.000
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Jangka Waktu</label>
                        </div>
                        <div class="col-md-8 col-6">
                            36 Bulan
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
                            <div style="color: blue"><b>Rp. 200.000.000</b></div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold; color: blue">Jumlah yg dibayarkan</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <div style="color: blue"><b>Rp. 200.000.000</b></div>
                        </div>
                    </div>
                    <hr />
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
                    <hr />

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <form>
                        <h3 class="mt-0">
                            <center>Input Biaya</center>
                        </h3>
                        <hr />
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
                                <input class="form-control @error('angsuran') is-invalid @enderror" type="text"
                                    value="{{ old('angsuran') }}" name="angsuran" id="angsuran">
                                @error('NoSpk')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Pilih Tabel Biaya
                            </label>
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <a class="btn btn-primary pencarian"><i class="fa fa-search"></i></a>
                                    <input type="text" id="namaBiaya" name="namaBiaya" value="{{ old('namaBiaya') }}"
                                        class="form-control @error('namaBiaya') is-invalid @enderror"
                                        placeholder="Search Tabel Biaya">
                                    @error('namaBiaya')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <a href="{{ route('biaya.index') }}">(+)Tambah Biaya</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Bunga
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('bunga') is-invalid @enderror" type="text"
                                    value="{{ old('bunga') }}" name="bunga" id="bunga" disabled>
                                @error('bunga')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Provisi
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('provisi') is-invalid @enderror" type="text"
                                    value="{{ old('provisi') }}" name="provisi" id="provisi" disabled>
                                @error('provisi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Administrator
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('provisi') is-invalid @enderror" type="text"
                                    value="{{ old('admin') }}" name="admin" id="admin" disabled>
                                @error('admin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Asuransi
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('provisi') is-invalid @enderror" type="text"
                                    value="{{ old('asuransi') }}" name="asuransi" id="asuransi" disabled>
                                @error('asuransi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Notaris
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('notaris') is-invalid @enderror" type="text"
                                    value="{{ old('notaris') }}" name="notaris" id="notaris" disabled>
                                @error('notaris')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Simpanan Pokok
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('simpPokok') is-invalid @enderror" type="text"
                                    value="{{ old('simpPokok') }}" name="simpPokok" id="simpPokok" disabled>
                                @error('simpPokok')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Simpanan Wajib
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('simpWajib') is-invalid @enderror" type="text"
                                    value="{{ old('simpWajib') }}" name="simpWajib" id="simpWajib" disabled>
                                @error('simpWajib')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Tabungan
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('tabungan') is-invalid @enderror" type="text"
                                    value="{{ old('tabungan') }}" name="tabungan" id="tabungan" disabled>
                                @error('tabungan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Hold Angsuran
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('hold') is-invalid @enderror" type="text"
                                    value="{{ old('hold') }}" name="hold" id="hold" disabled>
                                @error('hold')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Materai
                            </label>
                            <div class="col-sm-12">
                                <input class="form-control @error('materai') is-invalid @enderror" type="text"
                                    value="{{ old('materai') }}" name="materai" id="materai" disabled>
                                @error('materai')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Data Fasilitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="datatable2" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Biaya</th>
                                    <th>Bunga</th>
                                    <th>Provisi</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya as $biaya)
                                    <tr id="data" onClick="masuk(this,'{{ $biaya->namaBiaya }}')"
                                        href="javascript:void(0)">
                                        <td><a id="data" onClick="masuk(this,'{{ $biaya->namaBiaya }}')"
                                                href="javascript:void(0)">{{ $biaya->namaBiaya }}
                                        </td>
                                        <td>{{ $biaya->bunga }}</td>
                                        <td>{{ $biaya->provisi }}</td>
                                        <td>{{ $biaya->admin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            //focusin berfungsi ketika cursor berada di dalam textbox modal langsung aktif
            $(".pencarian").on('click', function() {
                $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
            });

            $('#datatable2').DataTable(); // fungsi ini untuk memanggil datatable
        });

        function masuk(txt, data) {
            document.getElementById('namaBiaya').value = data; // ini berfungsi mengisi value  yang ber id textbox
            $("#myModal").modal('hide'); // ini berfungsi untuk menyembunyikan modal
        }

        $("#namaBiaya").focusout(function(e) {
            e.preventDefault();

            var namaBiaya = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ route('disbursement.getdata') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'namaBiaya': namaBiaya
                },
                dataType: 'json',
                success: function(data) {
                    $('#bunga').val(data.bunga);
                    $('#provisi').val(data.provisi);
                    $('#admin').val(data.admin);
                    $('#asuransi').val(data.asuransi);
                    $('#notaris').val(data.notaris);
                    $('#simpPokok').val(data.simpPokok);
                    $('#simpWajib').val(data.simpWajib);
                    $('#tabungan').val(data.tabungan);
                    $('#hold').val(data.hold);
                    $('#materai').val(data.materai);

                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });

        });

        function myFunction() {
            var x = document.getElementById("NoSpk");
            x.value = x.value.toUpperCase();
        }
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("name");
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
    </script>
@endpush
