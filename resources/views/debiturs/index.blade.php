@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Debitur</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">Data Debitur</h5>
                    @can('create debitur')
                        <a href="{{ URL::to('debitur/create') }}" class="btn btn-primary waves-effect waves-light mb-3"><i
                                class="ti-plus">
                                Tambah
                                Data</i></button></a>
                    @endcan
                    <div class="table-responsive">
                        <table class="display" name="tabeldebitur" id="tabeldebitur">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col-3">No.</th>
                                    <th scope="col">No Debitur</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col-3">Nama Debitur</th>
                                    <th scope="col">No KTP</th>
                                    <th scope="col">Plafond</th>
                                    <th scope="col">JKW</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Status Pengajuan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalAction" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
@endsection

@push('scripts')
    @include('sweetalert::alert')
    <script>
        $(function() {
            //  Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Render DataTable
            $(document).ready(function() {
                $('#tabeldebitur').addClass('nowrap').DataTable(({
                    dom: 'lBfrtip',
                    aLengthMenu: [
                        [20, 30, 50, 75, -1],
                        [20, 25, 50, 75, "All"]
                    ],
                    pageLength: 20,
                    buttons: [
                        'copy', 'excel', 'pdf', 'csv', 'print'
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('debitur.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'userDT_RowIndex_id'
                        },
                        {
                            data: 'noDebitur',
                            name: 'noDebitur'
                        },
                        {
                            data: 'tglPengajuan',
                            name: 'tglPengajuan',
                            type: 'datetime',
                            def: () => new Date(),
                            format: 'dddd D MMMM YYYY',
                            fieldInfo: 'Verbose date format',
                            keyInput: false
                        },
                        {
                            data: 'name',
                            name: 'name'

                        },
                        {
                            data: 'noKtp',
                            name: 'noKtp'
                        },
                        {
                            data: 'plafond',
                            name: 'plafond'
                        },
                        {
                            data: 'jwk',
                            name: 'jwk'
                        },
                        {
                            data: 'cabang_id',
                            name: 'cabang_id'
                        },
                        {
                            data: 'perusahaan_id',
                            name: 'perusahaan_id'
                        },
                        {
                            data: 'accountOfficer_id',
                            name: 'accountOfficer_id',
                            type: 'datetime',
                            def: () => new Date(),
                            format: 'dddd D MMMM YYYY',
                            fieldInfo: 'Verbose date format',
                            keyInput: false
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                }));
            });



            $('#tabeldebitur').on('click', '.action', function() {
                let data = $(this).data()
                let id = data.id
                let jenis = data.jenis

                if (jenis == 'delete') {

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'DELETE',
                                url: `{{ url('debitur/') }}/${id}`,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Deleted!',
                                        response.message,
                                        response.status,
                                    )
                                    $('#tabeldebitur').DataTable().ajax.reload();
                                },
                                error: function(response) {
                                    Swal.fire(
                                        'Not Deleted!',
                                        response.message,
                                        response.status,
                                    )
                                }
                            });
                        }
                    })
                    return
                }
            });
        });
    </script>
@endpush
