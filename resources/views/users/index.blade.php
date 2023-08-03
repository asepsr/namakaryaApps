@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Users</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">Data Users</h5>
                    @can('create users')
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3 btn-add" data-toggle="modal"
                            data-animation="bounce" data-target=".bs-example-modal-center"><i class="ti-plus"> Tambah
                                Data</i></button></button>
                    @endcan
                    <div class="table-responsive">
                        {{ $dataTable->table() }}
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
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $('.btn-add').on('click', function() {
            $.ajax({
                type: "get",
                url: `{{ url('users/create') }}`,
                success: function(response) {
                    $('#modalAction').find('.modal-dialog').html(response)
                    $("#modalAction").modal("show");
                    $("#privilage").change(function() {
                        var selectedValue = $(this).val();
                        if (selectedValue === '1') {
                            $("#mitra").prop("disabled", true);
                        } else {
                            $("#mitra").prop("disabled", false);
                        }
                        if (selectedValue === '2') {
                            $("#cabang").prop("disabled", true);
                            $("#jabatan").prop("disabled", true);
                        } else {
                            $("#cabang").prop("disabled", false);
                            $("#jabatan").prop("disabled", false);
                        }
                    });
                    store()
                }
            });
        });

        function store() {
            $('#formAction').on('submit', function(e) {
                e.preventDefault()

                const _form = this
                const formData = new FormData(_form)

                const url = this.getAttribute('action')
                $.ajax({
                    type: "POST",
                    url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        window.LaravelDataTables["users-table"].ajax.reload()
                        $('#modalAction').find('.modal-dialog').html(response)
                        $("#modalAction").modal("hide");
                    },

                    error: function(response) {
                        let errors = response.responseJSON?.errors
                        $(_form).find('.text-danger.text-small').remove()
                        if (errors) {
                            for (const [key, value] of Object.entries(errors)) {
                                $(`[name='${key}']`).parent().append(
                                    `<span class="text-danger text-small">${value}</span>`
                                )
                            }
                        }
                    }
                });

            });
        }

        $('#users-table').on('click', '.action', function() {
            let data = $(this).data()
            let id = data.id
            let jenis = data.jenis

            if (jenis == 'edit') {
                $.ajax({
                    type: "get",
                    url: `{{ url('users/') }}/${id}/edit `,
                    success: function(response) {
                        $('#modalAction').find('.modal-dialog').html(response)
                        $("#modalAction").modal("show");
                        $("#privilage").change(function() {
                            var selectedValue = $(this).val();
                            if (selectedValue === '1') {
                                $("#mitra").prop("disabled", true);
                            } else {
                                $("#mitra").prop("disabled", false);
                            }
                            if (selectedValue === '2') {
                                $("#cabang").prop("disabled", true);
                                $("#jabatan").prop("disabled", true);
                            } else {
                                $("#cabang").prop("disabled", false);
                                $("#jabatan").prop("disabled", false);
                            }
                        });
                        store()
                    }
                });

                return
            }

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
                            url: `{{ url('users/') }}/${id}`,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log(response);
                                window.LaravelDataTables["users-table"].ajax.reload()
                                Swal.fire(
                                    'Deleted!',
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
    </script>
@endpush
