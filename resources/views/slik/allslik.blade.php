@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Slik Debitur</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">Data Slik</h5>
                    <div class="table-responsive">
                        <table class="table data-table" name="tableSlik" id="tableSlik">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col-3">No.</th>
                                    <th scope="col">Tgl slik</th>
                                    <th scope="col">No Debitur</th>
                                    <th scope="col">Nama Debitur</th>
                                    <th scope="col">Mitra</th>
                                    <th scope="col-3">Status Kolek</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Status</th>
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
                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('slik.allslik') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'userDT_RowIndex_id'
                    },
                    {
                        data: 'tglSlik',
                        name: 'tglSlik'
                    },
                    {
                        data: 'noDebitur',
                        name: 'noDebitur'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'mitra',
                        name: 'mitra'
                    },
                    {
                        data: 'statusKolek',
                        name: 'statusKolek'

                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                ]
            });

        });
    </script>
@endpush
