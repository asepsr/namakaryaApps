@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Kelengkapan Debitur</h4>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('debitur.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card m-b-30 card-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Nomor Debitur</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('noDebitur') is-invalid @enderror" type="text"
                                value="{{ $data->noDebitur }}" name="noDebitur" id="noDebitur" readonly>
                            @error('noDebitur')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-sm-4 col-form-label">Tgl Pengajuan (MM/DD/YYY)</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('tglPengajuan') is-invalid @enderror" type="date"
                                value="{{ $data->tglPengajuan }}" id="tglPengajuan" name="tglPengajuan">
                            @error('tglPengajuan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Nama Debitur</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                value="{{ $data->name }}" name="name" id="name" onkeyup="myFunction()">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Nama Ibu Kandung</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('ibuKandung') is-invalid @enderror" type="text"
                                value="{{ $data->ibuKandung }}" name="ibuKandung" id="ibuKandung"
                                style="text-transform: uppercase">
                            @error('ibuKandung')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">No KTP</label>
                        <div class="col-sm-12">
                            <input class="form-control  @error('noKtp') is-invalid @enderror" type="number"
                                value="{{ $data->noKtp }}" name="noKtp" id="noKtp">
                            @error('noKtp')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('tlp') is-invalid @enderror" type="number"
                                value="{{ $data->tlp }}" name="tlp" id="tlp">
                            @error('tlp')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">plafond</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('plafond') is-invalid @enderror" type="number"
                                value="{{ $data->plafond }}" name="plafond" id="plafond">
                            @error('plafond')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Jangka waktu</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('jwk') is-invalid @enderror" type="number"
                                value="{{ $data->jwk }}" name="jwk" id="jwk">
                            @error('jwk')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Cabang</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('cabang_id') is-invalid @enderror" name="cabang_id"
                                id="cabang_id">
                                <option value='0'>--Select--</option>
                                @foreach ($cabang as $cabang)
                                    <option value="{{ $cabang->id }}"
                                        {{ $cabang->id == $data->cabang_id ? 'selected' : '' }}>
                                        {{ $cabang->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cabang_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Account Officer</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('accountOfficer_id') is-invalid @enderror"
                                name="accountOfficer_id" id="accountOfficer_id">
                                @foreach ($account as $account)
                                    <option value="{{ $account->id }}"
                                        {{ $account->id == $data->accountOfficer_id ? 'selected' : '' }}>
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('accountOfficer_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('tmptLahir') is-invalid @enderror" type="text"
                                value="{{ $data->tmptLahir }}" id="tmptLahir" name="tmptLahir">
                            @error('tmptLahir')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal
                            Lahir (MM/DD/YYY)</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('tglLahir') is-invalid @enderror" type="date"
                                value="{{ $data->tglLahir }}" id="tglLahir" name="tglLahir">
                            @error('tglLahir')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-12">
                            <textarea id="domisili" value="{{ $data->alamat }}" name="alamat"
                                class="form-control @error('alamat') is-invalid @enderror" maxlength="225" rows="3" placeholder="">{{ $data->alamat }}</textarea>
                            @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card m-b-30 card-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Nama Pasangan</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('namaPasangan') is-invalid @enderror" type="text"
                                value="{{ $data->namaPasangan }}" id="namaPasangan" name="namaPasangan">
                            @error('namaPasangan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-sm-4 col-form-label">Tgl Lahir Pasangan
                            (MM/DD/YYY)</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('tglLahirPasangan') is-invalid @enderror" type="date"
                                value="{{ $data->tglLahirPasangan }}" id="tglLahirPasangan" name="tglLahirPasangan">
                            @error('tglLahirPasangan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Pendidikan</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan"
                                id="pendidikan">
                                <option {{ $data->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                <option {{ $data->pendidikan == 'SLTP' ? 'selected' : '' }}>SLTP</option>
                                <option {{ $data->pendidikan == 'SLTA' ? 'selected' : '' }}>SLTA</option>
                                <option {{ $data->pendidikan == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option {{ $data->pendidikan == 'S1-Strata' ? 'selected' : '' }}>S1-Strata</option>
                                <option {{ $data->pendidikan == 'S2-Strata' ? 'selected' : '' }}>S2-Strata</option>
                                <option {{ $data->pendidikan == 'S3-Strata' ? 'selected' : '' }}>S3-Strata</option>
                                <option {{ $data->pendidikan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>

                            </select>
                            @error('pendidikan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Status
                            Perkawinan</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('statusKawin') is-invalid @enderror" name="statusKawin"
                                id="statusKawin">
                                <option {{ $data->statusKawin == 'Belum menikah' ? 'selected' : '' }}>Belum menikah
                                </option>
                                <option {{ $data->statusKawin == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option {{ $data->statusKawin == 'Duda' ? 'selected' : '' }}>Duda</option>
                                <option {{ $data->statusKawin == 'Janda' ? 'selected' : '' }}>Janda</option>
                            </select>
                            @error('statusKawin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">NPWP</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('npwp') is-invalid @enderror" type="text"
                                value="{{ $data->npwp }}" name="npwp" id="npwp">
                            @error('npwp')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Domisili</label>
                        <div class="col-sm-12">
                            <textarea id="domisili" value="" name="domisili"
                                class="form-control @error('domisili') is-invalid @enderror" maxlength="225" rows="7" placeholder="">{{ $data->domisili }}</textarea>
                            @error('domisili')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Status Tinggal</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('stsTinggal') is-invalid @enderror" name="stsTinggal"
                                id="stsTinggal">
                                <option {{ $data->stsTinggal == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                <option {{ $data->stsTinggal == 'Milik Orang tua' ? 'selected' : '' }}>Milik Orang tua
                                </option>
                                <option {{ $data->stsTinggal == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                                <option {{ $data->stsTinggal == 'Dinas' ? 'selected' : '' }}>Dinas</option>
                            </select>
                            @error('stsTinggal')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama perusahaan</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('perusahaan_id') is-invalid @enderror"
                                name="perusahaan_id" id="perusahaan_id">
                                @foreach ($perusahaan as $perusahaan)
                                    <option value="{{ $perusahaan->id }}"
                                        {{ $perusahaan->id == $data->perusahaan_id ? 'selected' : '' }}>
                                        {{ $perusahaan->namaPerusahaan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('perusahaan_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Jenis
                            Pekerjaan</label>
                        <div class="col-sm-12">
                            <select class="form-control @error('jenisPekerjaan') is-invalid @enderror"
                                name="jenisPekerjaan" id="jenisPekerjaan">
                                <option {{ $data->jenisPekerjaan == 'Profesional' ? 'selected' : '' }}>Profesional</option>
                                <option {{ $data->jenisPekerjaan == 'karyawan swasta' ? 'selected' : '' }}>karyawan swasta
                                </option>
                                <option {{ $data->jenisPekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option {{ $data->jenisPekerjaan == 'Pengusaha' ? 'selected' : '' }}>Pengusaha</option>
                                <option {{ $data->jenisPekerjaan == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                                <option {{ $data->jenisPekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('jenisPekerjaan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Lama Bekerja</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('lamaBekerja') is-invalid @enderror" type="number"
                                value="{{ $data->lamaBekerja }}" id="lamaBekerja" name="lamaBekerja">
                            @error('lamaBekerja')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <h5><b>Tahun</b></h5>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Gaji bersih</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('gaji') is-invalid @enderror" type="number"
                                value="{{ $data->gaji }}" id="gaji" name="gaji">
                            @error('gaji')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    </br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-30 card-body">
                    <div style="color: red">* Upload file dokument dengan format .RAR .PDF<br />*Abaikan Apabila berkas
                        tidak diubah<br />* Size berkas Max 10 MB</div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Upload Dokumen</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="needsclick dropzone" id="document-dropzone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="{{ route('debitur.index') }}" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</a>
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
            var x = document.getElementById("name");
            x.value = x.value.toUpperCase();
        }

        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('debitur.storeMedia') }}',
            maxFilesize: 10, // MB
            acceptedFiles: 'image/*,application/pdf,.rar,.zip',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
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
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                        {!! json_encode($project->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endpush
