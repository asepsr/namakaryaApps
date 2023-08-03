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
                        <label style="font-weight:bold;">Tanggal Pengajuan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->tglPengajuan }}
                    </div>
                </div>
                <hr />

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nama Debitur</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->name }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nama Ibu Kandung</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->ibuKandung }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nomor KTP</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->noKtp }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nomor Telepon</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->tlp }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Plafond</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->plafond }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Cabang</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->cabang->name }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Account EMC</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->accountofficer->name }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Tempat Lahir</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->tmptLahir }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->tglLahir }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Alamat</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->alamat }}
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
                        {{ $data->namaPasangan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Tanggal Lahir Pasangan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->tglLahirPasangan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Pendidikan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->pendidikan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Status Kawin</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->statusKawin }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Nomor NPWP</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->npwp }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Domisili</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->domisili }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Status Tinggal</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->stsTinggal }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Perusahaan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->perusahaan->namaPerusahaan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Jenis Pekerjaan</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->jenisPekerjaan }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Lama Bekerja</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->lamaBekerja }} Tahun
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-6">
                        <label style="font-weight:bold;">Take Home Pay</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{ $data->gaji }}
                    </div>
                </div>
                <hr />
            </div>
        </div>
        <form method="post" action="{{ route('debitur.ajukan', $data->id) }}">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="card m-b-30 card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-white" id="tableEstimate">
                                <thead>
                                    <tr>
                                        <th class="col-sm-2">No</th>
                                        <th class="col-sm-2">Kirim Pengajuan Mitra</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><select class="form-control" id="mitra" name="mitra[]"
                                                style="min-width:650px">
                                                <option>--Select--</option>
                                                @foreach ($mitra as $mitra)
                                                    <option value="{{ $mitra->id }}">{{ $mitra->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input class="form-control user_id" value="{{ auth()->user()->id }}"
                                                style="min-width:500px" type="text" id="user_id" name="user_id[]"
                                                hidden>
                                        </td>
                                        <td><input class="form-control debitur_id" value="{{ $data->id }}"
                                                style="min-width:500px" type="text" id="debitur_id"
                                                name="debitur_id[]" hidden>
                                        </td>
                                        <td><input class="form-control cabang_id" value="{{ $data->cabang_id }}"
                                                style="min-width:500px" type="text" id="cabang_id" name="cabang_id[]"
                                                hidden>
                                        </td>
                                        <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                                id="addBtn"><i class="fa fa-plus"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-lg-12 mt-3">
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                    <a href="{{ route('debitur.index') }}" type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        var rowIdx = 1;
        $("#addBtn").on("click", function() {
            $("#tableEstimate tbody").append(`
                        <tr id="R${++rowIdx}">
                            <td class="row-index"><p> ${rowIdx}</p></td>
                            <td><select class="form-control" id="mitra" name="mitra[]"
                                                style="min-width:150px">
                                                <option>--Select--</option>
                                                @foreach ($mitra2 as $mitra2)
                                                    <option value="{{ $mitra2->id }}">{{ $mitra2->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input class="form-control user_id" value="{{ auth()->user()->id }}"
                                                style="min-width:150px" type="text" id="user_id" name="user_id[]" hidden>
                                        </td>
                                        <td><input class="form-control debitur_id" value="{{ $data->id }}"
                                                style="min-width:150px" type="text" id="debitur_id"
                                                name="debitur_id[]" hidden>
                                        </td>
                                        <td><input class="form-control cabang_id" value="{{ $data->cabang_id }}"
                                                style="min-width:500px" type="text" id="cabang_id" name="cabang_id[]"
                                                hidden>
                                        </td>
                            <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                        </tr>`);
        });
        $("#tableEstimate tbody").on("click", ".remove", function() {
            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest("tr").nextAll();
            // Iterating across all the rows
            // obtained to change the index
            child.each(function() {
                // Getting <tr> id.
                var id = $(this).attr("id");

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children(".row-index").children("p");

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`${dig - 1}`);

                // Modifying row id.
                $(this).attr("id", `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest("tr").remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
        });
    </script>
@endpush
