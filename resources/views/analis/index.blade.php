@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Analis</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{ route('analis.store') }}">
                @csrf
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" id="debitur_id" name="debitur_id" class="form-control" hidden>
                                    <input type="text" id="fasilitas_id" name="fasilitas_id" class="form-control" hidden>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="name">Nomor Debitur</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <a class="btn btn-primary pencarian"><i class="fa fa-search"></i></a>
                                                <input type="text" id="noDebitur" name="noDebitur"
                                                    value="{{ old('noDebitur') }}"
                                                    class="form-control @error('debitur_id') is-invalid @enderror"
                                                    placeholder="Search nomor debitur">
                                                @error('debitur_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nomor Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noFasilitas" name="noFasilitas" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nama Debitur</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaDebitur" name="namaDebitur" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Tempat Lahir</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="tmpLahir" name="tmpLahir" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="date" id="tglLahir" name="tglLahir" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Plafond</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="plafond" name="plafond" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Collection</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaCollection" name="namaCollection"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="lastname">Tanggal Mpp</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="date" value="{{ date('Y-m-d') }}" id="tglMpp" name="tglMpp"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Jenis Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="jenisFasilitas" name="jenisFasilitas"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor Surat</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noSurat" name="noSurat" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Tujuan Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="tujuanFasilitas" name="tujuanFasilitas"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Area Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-control" id="cabang" name="cabang_id">
                                                <option value="">---Select---</option>
                                                @foreach ($cabang as $cabang)
                                                    <option value="{{ $cabang->id }}">
                                                        {{ $cabang->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Area Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-control" id="namaLo" name="namaLo">
                                                <option value="">---Select---</option>
                                                @foreach ($namaLo as $namaLo)
                                                    <option value="{{ $namaLo->id }}">
                                                        {{ $namaLo->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Team Leader</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaTl" name="namaTl" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Rate Bunga</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="rate" name="rate" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="email">%</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Tenor</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="tenor" name="tenor" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="email">Tahun</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor Kontrak</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noKontrak" name="noKontrak" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Data Jaminan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="dataJaminan" name="dataJaminan"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor BPJS</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noBPJS" name="noBPJS" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Saldo BPJS</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="saldoBpjs" name="saldoBpjs" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Jenis Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="jenisPengajuan" name="jenisPengajuan"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Deskripsi</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="deskripsi" name="deskripsi" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-3">ANALISA KEUANGAN (per Bulan) (berdasarkan Slip Gaji
                                Terakhir)</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-white" id="tablePenghasilan">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th class="col-sm-10">Penghasilan Bersih Lainnya</th>
                                            <th class="col-sm-2">Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input class="form-control" style="min-width:150px" type="text"
                                                    id="hasilLain" name="hasilLain[]"></td>
                                            <td><input class="form-control amount" style="min-width:150px" type="text"
                                                    id="amount" name="amount[]"></td>

                                            <td><a href="javascript:void(0)" class="text-success font-18" title="Add2"
                                                    id="addBtn2"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-white">
                                    <tbody>
                                        <tr>
                                            <td colspan="5" style="text-align: right; font-weight: bold">
                                                Total Penghasilan Bersih
                                            </td>
                                            <td style="font-size: 16px;width: 230px">
                                                <input class="form-control text-right grand_total" type="text"
                                                    id="grand_total" name="grand_total" value="0" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->

                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title mb-3">Pinjaman di tempat lain</h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-white" id="tableEstimate">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th class="col-sm-2">Nama Bank</th>
                                            <th class="col-sm-2">Loan Plafond</th>
                                            <th class="col-sm-2">Outstanding</th>
                                            <th class="col-sm-2">Angsuran</th>
                                            <th class="col-sm-2">Tujuan Pinjaman</th>
                                            <th class="col-sm-2">Deskripsi</th>
                                            <th class="col-sm-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input class="form-control" style="min-width:150px" type="text"
                                                    id="bankName" name="bankName[]"></td>
                                            <td><input class="form-control loan" style="min-width:150px" type="text"
                                                    id="loan" name="loan[]"></td>
                                            <td><input class="form-control outstanding" style="min-width:150px"
                                                    type="text" id="outstanding" name="outstanding[]"></td>
                                            <td><input class="form-control angsuran" style="min-width:150px"
                                                    type="text" id="angsuran" name="angsuran[]"></td>
                                            <td><input class="form-control" style="min-width:150px" type="text"
                                                    id="tujuanPinjaman" name="tujuanPinjaman[]"></td>
                                            <td><input class="form-control" style="min-width:150px" type="text"
                                                    id="keterangan" name="keterangan[]"></td>
                                            <td><select class="form-control" id="statusPinjaman" name="statusPinjaman[]"
                                                    style="min-width:150px">
                                                    <option>--Select--</option>
                                                    <option value="1">Pengajuan Bank</option>
                                                    <option value="2">Pengajuan Baru</option>
                                                </select>
                                            </td>

                                            <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                                    id="addBtn"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-lg-12 mt-3">
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                        <a href="{{ route('analis.index') }}" type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->
            </form>
        </div>

        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-white" id="tableAnalis">
                            <thead>
                                <tr>
                                    <th style="width: 20px">#</th>
                                    <th class="col-sm-2">Analis Number</th>
                                    <th class="col-sm-2">Nama Debitur</th>
                                    <th class="col-sm-2">Tanggal MPP</th>
                                    <th class="col-sm-2">Jenis Fasilitas</th>
                                    <th class="col-sm-2">Nomor BPJS</th>
                                    <th class="col-sm-2">Saldo BPJS</th>
                                    <th class="col-sm-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
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
                                    <th>Nomor Debitur</th>
                                    <th>Nomor Fasilitas</th>
                                    <th>Nama Debitur</th>
                                    <th>Plafond</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fasilitas as $fasilitas)
                                    <tr id="data" onClick="masuk(this,'{{ $fasilitas->noDebitur }}')"
                                        href="javascript:void(0)">
                                        <td><a id="data" onClick="masuk(this,'{{ $fasilitas->noDebitur }}')"
                                                href="javascript:void(0)">{{ $fasilitas->noDebitur }}</td>
                                        <td>{{ $fasilitas->noFasilitas }}</td>
                                        <td>{{ $fasilitas->name }}</td>
                                        <td>{{ $fasilitas->plafond }}</td>
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
        var rowIdx = 1;
        $("#addBtn").on("click", function() {
            // Adding a row inside the tbody.
            $("#tableEstimate tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index"><p> ${rowIdx}</p></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="bankName" name="bankName[]"></td>
                                    <td><input class="form-control loan" style="min-width:150px" type="text"
                                            id="loan" name="loan[]"></td>
                                    <td><input class="form-control outstanding" style="min-width:150px" type="text"
                                            id="outstanding" name="outstanding[]"></td>
                                    <td><input class="form-control angsuran" style="min-width:150px" type="text"
                                            id="angsuran" name="angsuran[]"></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="tujuanPinjaman" name="tujuanPinjaman[]"></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="keterangan" name="keterangan[]"></td>
                                    <td><select class="form-control" id="statusPinjaman" name="statusPinjaman[]"
                                            style="min-width:150px">
                                            <option>--Select--</option>
                                            <option value="1">Pengajuan Bank</option>
                                            <option value="2">Pengajuan Baru</option>
                                        </select>
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

        $("#addBtn2").on("click", function() {
            // Adding a row inside the tbody.
            $("#tablePenghasilan tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index"><p> ${rowIdx}</p></td>
                    <td><input class="form-control" style="min-width:150px" type="text"
                            id="hasilLain" name="hasilLain[]"></td>
                    <td><input class="form-control amount" style="min-width:150px" type="text"
                            id="amount" name="amount[]"></td>

                    <td><a href="javascript:void(0)" class="text-danger font-18 remove2" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                </tr>`);
        });
        $("#tablePenghasilan tbody").on("click", ".remove2", function() {
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

            $('#grand_total').val("");
            $('.amount').val("");

        });

        $(document).ready(function() {
            //focusin berfungsi ketika cursor berada di dalam textbox modal langsung aktif
            $(".pencarian").on('click', function() {
                $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
            });

            $('#datatable2').DataTable(); // fungsi ini untuk memanggil datatable
        });

        // function in berfungsi untuk memindahkan data kolom yang di klik menuju text box
        function masuk(txt, data) {
            document.getElementById('noDebitur').value = data; // ini berfungsi mengisi value  yang ber id textbox
            $("#myModal").modal('hide'); // ini berfungsi untuk menyembunyikan modal
        }

        $("#noDebitur").focusout(function(e) {
            e.preventDefault();

            var noDebitur = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ route('analis.getdata') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'noDebitur': noDebitur
                },
                dataType: 'json',
                success: function(data) {
                    $('#debitur_id').val(data.debitur_id);
                    $('#fasilitas_id').val(data.id);
                    $('#namaDebitur').val(data.name);
                    $('#tmpLahir').val(data.tmpLahir);
                    $('#cabang_id').val(data.cabang_id);
                    $('#noFasilitas').val(data.noFasilitas);
                    $('#plafond').val(data.plafond);
                    $('#tmptLahir').val(data.tmptLahir);
                    $('#tglLahir').val(data.tglLahir);

                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });

        });

        // Render DataTable
        var table = $('#tableAnalis').addClass('nowrap').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('analis.dtanalis') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'userDT_RowIndex_id'
                },
                {
                    data: 'analis_number',
                    name: 'analis_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'tglMpp',
                    name: 'tglMpp'
                },
                {
                    data: 'jenisFasilitas',
                    name: 'jenisFasilitas'
                },
                {
                    data: 'noBpjs',
                    name: 'noBpjs'
                },
                {
                    data: 'saldoBpjs',
                    name: 'saldoBpjs'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $("#tablePenghasilan tbody").on("input", ".amount", function() {
            var amount = parseFloat($(this).val());
            var grand_total = $(this).closest("tr").find(".grand_total");
            calc_total();
        });

        function calc_total() {
            var sum = 0;
            $(".amount").each(function() {
                sum += parseFloat($(this).val());
            });
            $(".subtotal").text(sum);

            var amounts = sum;
            $(document).on("change keyup blur", "#amount", function() {
                $("#grand_total").val(amounts);
            });
        }
    </script>
@endpush
