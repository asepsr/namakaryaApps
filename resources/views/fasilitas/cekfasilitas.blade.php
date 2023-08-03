@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Kelengkapan Debitur</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card m-b-30 card-body">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-4">
                        <label style="font-weight:bold;">No Debitur</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->noDebitur }}
                    </div>
                </div>
                <hr />
                {{-- <div class="row">
                    <div class="col-sm-4 col-md-4 col-4">
                        <label style="font-weight:bold;">No Fasilitas</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $fasilitas->noFasilitas }}
                    </div>
                </div>
                <hr /> --}}
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-4">
                        <label style="font-weight:bold;">Tanggal Pengajuan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->tglPengajuan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nama Debitur</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->name }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nama Ibu Kandung</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->ibuKandung }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nomor KTP</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->noKtp }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nomor Telepon</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->tlp }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Plafond</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->plafond }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Cabang</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->cabang->name }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Account EMC</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->accountofficer->name }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Tempat Lahir</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->tmptLahir }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->tglLahir }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Alamat</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->alamat }}
                    </div>
                </div>
                <hr />
            </div>
        </div>
        <div class="col-md-6">
            <div class="card m-b-30 card-body">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nama Pasangan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->namaPasangan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Tanggal Lahir Pasangan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->tglLahirPasangan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Pendidikan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->pendidikan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Status Kawin</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->statusKawin }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nomor NPWP</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->npwp }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Domisili</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->domisili }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Status Tinggal</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->stsTinggal }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Perusahaan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->perusahaan->namaPerusahaan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Jenis Pekerjaan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->jenisPekerjaan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Lama Bekerja</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->lamaBekerja }} Tahun
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Take Home Pay</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $debitur->gaji }}
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Checking Fasilitas Debitur</h4>
                    <hr>
                    <form method="post" action="{{ route('fasilitas.approve', $data->noFasilitas) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">kolektibilitas Slik</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('statusKolek') is-invalid @enderror" name="statusKolek"
                                    id="statusKolek">
                                    <option value="0">--Select--</option>
                                    <option value="1-Lancar">Lancar</option>
                                    <option value="2-Dalam Perhatian Khusus">Dalam Perhatian Khusus</option>
                                    <option value="3-Kurang Lancar">Kurang lancar</option>
                                    <option value="4-Diragukan">Diragukan</option>
                                    <option value="5-Macet">Macet</option>
                                </select>
                                @error('statusKolek')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status Slik</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('statusSlik') is-invalid @enderror" name="statusSlik"
                                    id="statusSlik">
                                    <option value="0">--Select--</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Reject">Reject</option>
                                </select>
                                @error('statusSlik')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('note') is-invalid @enderror" type="text" value="" id="note"
                                    name="note"></textarea>
                                @error('note')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Plafond Rekomendasi</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('plafondRekomendasi') is-invalid @enderror"
                                    type="number" value="" id="plafondRekomendasi" name="plafondRekomendasi">
                                @error('plafondRekomendasi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div style="color: red">* Kosongkan apabila keputusan fasilitas sesuai dengan plafond yang
                                    di ajukan</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keputusan Fasilitas</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas"
                                    id="statusSlik">
                                    <option value="0">--Select--</option>
                                    <option value="1">Approve</option>
                                    <option value="2">Reject</option>
                                </select>
                                @error('fasilitas')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        </br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('fasilitas.index') }}" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</a>
                            </div>
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

        });
        $(document).ready(function() {
            if ($("#alasanTolak").length > 0) {
                tinymce.init({
                    selector: "textarea#alasanTolak",
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
