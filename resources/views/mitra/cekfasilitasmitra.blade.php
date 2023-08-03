@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Fasilitas</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="card-header mt-0">No Fasilitas : {{ $data->noFasilitas }}</h4>
                    <hr>
                    @if ($data->status == 6)
                        <a href="{{ route('fasilitas.index') }}" class="btn btn-secondary btn-xl mb-03">Back</a>
                        <a href="{{ route('fasilitas.approvemitra', $data->id) }}" class="btn btn-primary btn-xl">Approve
                        <a href="{{ route('fasilitas.rejectmitra', $data->id) }}" class="btn btn-danger btn-xl">  Reject </a>
                        <a class="btn btn-warning btn-xl" href="javascript:void(0)" id="revisiBtn">Revisi
                            Berkas<a>
                            @elseif($data->status == 9)
                                <span class="badge badge-success">
                                    <h4>APPROVE FASILITAS</h4>
                                </span>
                    @endif
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10 ">
                            <b>: {{ date('d F Y', strtotime($debitur->tglPengajuan)) }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nomor Debitur</label>
                        <div class="col-sm-10">
                            <b>: {{ $debitur->noDebitur }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name Debitur</label>
                        <div class="col-sm-10">
                            <b>: {{ $debitur->name }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name Ibu Kandung</label>
                        <div class="col-sm-10">
                            <b>: {{ $debitur->ibuKandung }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">No KTP</label>
                        <div class="col-sm-10">
                            <b>: {{ $debitur->noKtp }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <b>: {{ $debitur->tlp }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">plafond</label>
                        <div class="col-sm-10">
                            <b>: Rp. {{ number_format($debitur->plafond) }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <b>: {{ $debitur->alamat }}</b>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="card-header mt-0">Data Pribadi Debitur</h4>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <hr>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal
                                    Lahir</label>
                                <div class="col-sm-8 col-form-label">
                                    <b>: {{ date('d F Y', strtotime($data->tglLahir)) }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <b> : {{ $data->tmpLahir }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Nama Pasangan</label>
                                <div class="col-sm-8">
                                    <b> : {{ $data->namaPasangan }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal
                                    Lahir Pasangan</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->tglLahirPasangan }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Pendidikan</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->pendidikan }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Status
                                    Perkawinan</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->stsKawin }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">NPWP</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->npwp }}</b>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6">
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Alamat
                                    Sekarang</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->alamatSkrng }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Status
                                    Tinggal</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->stsTinggal }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Jenis
                                    Pekerjaan</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->jnsPekerjaan }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Nama
                                    Perusahaan</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->namaPerusahaan }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Telepon
                                    Perusahan</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->tlpPerusahaan }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Lama
                                    Bekerja</label>
                                <div class="col-sm-8">
                                    <b>: {{ $data->lamaBekerja }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Penghasilan
                                    Bersih</label>
                                <div class="col-sm-8">
                                    <b>: Rp. {{ number_format($data->penghasilan) }}</b>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="card-header mt-0">Berkas Pengajuan Pinjaman</h4>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-sm ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Berkas</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Buku Nikah</th>
                                            <td>{{ $data->bukuNikah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Akta Cerai</th>
                                            <td>{{ $data->aktaCerai }}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto Peminjam</th>
                                            <td>{{ $data->fotoPeminjam }}</td>
                                        </tr>
                                        <tr>
                                            <th>Id Card</th>
                                            <td>{{ $data->idCard }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surat HRD</th>
                                            <td>{{ $data->suratHrd }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surat Bekerja</th>
                                            <td>{{ $data->suratBekerja }}</td>
                                        </tr>
                                        <tr>
                                            <th>Slip Gaji</th>
                                            <td>{{ $data->slipGaji }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mutasi Rekening</th>
                                            <td>{{ $data->mutasiRekening }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kartu BPJS</th>
                                            <td>{{ $data->kartuBpjs }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ijazah rerakhir</th>
                                            <td>{{ $data->ijazahTerakhir }}</td>
                                        </tr>
                                        <tr>
                                            <th>Institusi Slik</th>
                                            <td>{{ $data->institusiLk }}</td>
                                        </tr>
                                        <tr>
                                            <th>Verifikasi perusahaan</th>
                                            <td>{{ $data->verifPerusahaan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-sm ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Berkas</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Kerja analisis</th>
                                            <td>{{ $data->kerjaAnalisis }}</td>
                                        </tr>
                                        <tr>
                                            <th>Verifikasi perusahaan</th>
                                            <td>{{ $data->verifPerusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kerja analisis</th>
                                            <td>{{ $data->kerjaAnalisis }}</td>
                                        </tr>
                                        <tr>
                                            <th>Survei lingkungan</th>
                                            <td>{{ $data->surveiLingkungan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto rumah</th>
                                            <td>{{ $data->fotoRumah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Skoring kredit</th>
                                            <td>{{ $data->skoringKredit }}</td>
                                        </tr>
                                        <tr>
                                            <th>Denah lokasi</th>
                                            <td>{{ $data->denahLokasi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mpp</th>
                                            <td>{{ $data->mpp }}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto atm</th>
                                            <td>{{ $data->fotoAtm }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payroll Pelunasan</th>
                                            <td>{{ $data->payrollPelunasan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Executive Summary</th>
                                            <td>{{ $data->executiveSummary }}</td>
                                        </tr>
                                        <tr>
                                            <th>Dokumen Tambahan</th>
                                            <td>{{ $data->dokumenTambahan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="revisi" name="revisi" action="{{ route('fasilitas.revisimitra', $data->id) }}"
                        class="form-horizontal" method="POST">
                        @csrf
                        @if ($data->id)
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Note Revisi</label>
                            <div class="col-sm-12">
                                <textarea id="notemitra" name="notemitra" placeholder="Enter Details" class="form-control form-control-lg mb-3">{{ $data->notemitra }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*-- Click to Button--*/
            $('#revisiBtn').click(function() {
                $('#saveBtn').val("create-product");
                $('#productForm').trigger("reset");
                $('#modelHeading').html("Form Note Revisi");
                $('#ajaxModel').modal('show');
            });

        });



        $(document).ready(function() {
            if ($("#notemitra").length > 0) {
                tinymce.init({
                    selector: "textarea#notemitra",
                    theme: "modern",
                    height: 300,
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [{
                            title: 'Bold text',
                            inline: 'b'
                        },
                        {
                            title: 'Red text',
                            inline: 'span',
                            styles: {
                                color: '#ff0000'
                            }
                        },
                        {
                            title: 'Red header',
                            block: 'h1',
                            styles: {
                                color: '#ff0000'
                            }
                        },
                        {
                            title: 'Example 1',
                            inline: 'span',
                            classes: 'example1'
                        },
                        {
                            title: 'Example 2',
                            inline: 'span',
                            classes: 'example2'
                        },
                        {
                            title: 'Table styles'
                        },
                        {
                            title: 'Table row 1',
                            selector: 'tr',
                            classes: 'tablerow1'
                        }
                    ]
                });
            }
        });
    </script>
@endpush
