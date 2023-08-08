@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Disbursement Fasilitas</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">Data Disbursement</h5>
                    <div class="table-responsive">
                        <table class="table data-table" name="tableSlik" id="tableSlik">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col-3">No.</th>
                                    <th scope="col">No Debitur</th>
                                    <th scope="col">No Fasilitas</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Tgl Approve</th>
                                    <th scope="col-3">Nama Debitur</th>
                                    <th scope="col">No KTP</th>
                                    <th scope="col">Plafond Approve</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
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
            var table = $('#tableSlik').addClass('nowrap').DataTable({
                dom: 'lBfrtip',
                aLengthMenu: [
                    [20, 30, 50, 75, -1],
                    [20, 25, 50, 75, "All"]
                ],
                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('disbursement.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'userDT_RowIndex_id'
                    },
                    {
                        data: 'noDebitur',
                        name: 'noDebitur'
                    },
                    {
                        data: 'noFasilitas',
                        name: 'noFasilitas'
                    },
                    {
                        data: 'tglPengajuan',
                        name: 'tglPengajuan'
                    },
                    {
                        data: 'tglApprove',
                        name: 'tglApprove'
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
                        data: 'plafondApprove',
                        name: 'plafondApprove'
                    },
                    {
                        data: 'cabang_id',
                        name: 'cabang_id'
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
