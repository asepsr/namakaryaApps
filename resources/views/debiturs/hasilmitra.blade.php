@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card m-b-20 card-body text-lg-center">
                <div style="font-size: 30px"> Hasil Approval Fasilitas Pinjaman</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @foreach ($data as $data)
                <div class="card card-body mb-3">
                    <div style="font-size: 25px "> <b>{{ $data->namaMitra }}</b></div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">Kode Fasilitas</th>
                                <td>
                                    @if ($data->noFasilitas == !null)
                                        {{ $data->noFasilitas }}
                                    @else
                                        Data Pending
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">kolektibilitas debitur</th>
                                <td>
                                    @if ($data->statusKolek == !null)
                                        {{ $data->statusKolek }}
                                    @else
                                        Data Pending
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Hasil Slik</th>
                                <td>
                                    @if ($data->slik == !null)
                                        {{ $data->slik }}
                                    @else
                                        Data Pending
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Plafond disetujui</th>
                                <td>
                                    @if ($data->plafondRekomendasi == !null)
                                        Rp. {{ number_format($data->plafondRekomendasi) }}
                                    @else
                                        Data Pending
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Keterangan</th>
                                <td>
                                    @if ($data->note == !null)
                                        {{ $data->note }}
                                    @else
                                        Data Pending
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Fasilitas diperiksa Mitra</th>
                                <td>
                                    @if ($data->status == !null)
                                        @if ($data->status == 1)
                                            <h5><span class="badge badge-success">Approve Fasilitas</span></h5>
                                        @else
                                            <h5><span class="badge badge-danger">Reject Fasilitas</span></h5>
                                        @endif
                                    @else
                                        <h5><span class="badge badge-warning">Data Pending</span></h5>
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Fasilitas diperiksa Namastra</th>
                                <td>
                                    @if ($data->status2 == !null)
                                        @if ($data->status2 == 1)
                                            <h5><span class="badge badge-success">Approve Fasilitas</span></h5>
                                        @elseif($data->status2 == 2)
                                            <h5><span class="badge badge-danger">Reject Fasilitas</span></h5>
                                        @elseif($data->status2 == 3)
                                            <h5><span class="badge badge-danger">Batal Fasilitas</span></h5>
                                        @endif
                                    @else
                                        <h5><span class="badge badge-warning">Data Pending</span></h5>
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">Updated : {{ $data->updateFasilitas }}</td>
                                <td align="right">
                                    @if (empty($data->status2))
                                        <button class="btn btn-success btnApprove" data-id="{{ $data->noFasilitas }}"
                                            data-status="1">Approve</button>
                                        <button class="btn btn-danger btnReject" data-id="{{ $data->noFasilitas }}"
                                            data-status="2">Reject</button>
                                        <button class="btn btn-warning btnBatal" data-id="{{ $data->noFasilitas }}"
                                            data-status="3">Batal</button>
                                    @elseif ($data->status2 == !null)
                                        Data Update
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30 card-body">
                <form method="post" action="{{ route('debitur.kirim', $data->debitur_id) }}">
                    @csrf
                    @method('PUT')
                    <div style="font-size: 15px ">
                        <h3> <b>Kirim Data Cabang</h3></b>
                    </div>
                    <hr />
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Keputusan Fasilitas</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('sttApprovel') is-invalid @enderror" name="sttApprovel"
                                id="sttApprovel">
                                <option value="0">--Select--</option>
                                <option value="1">Approve</option>
                                <option value="2">Reject</option>
                                <option value="3">Batal Pengajuan</option>
                            </select>
                            @error('sttApprovel')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Kesimpulan Hasil Fasilitas</label>
                        <div class="col-sm-12">
                            <textarea id="domisili" value="{{ old('keterangan') }}" name="keterangan"
                                class="form-control @error('keterangan') is-invalid @enderror" maxlength="225" rows="7" placeholder=""></textarea>
                            @error('keterangan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Kirim Hasil</button>
                            <a href="{{ route('debitur.index') }}" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // AJAX untuk mengirim permintaan update status
        $(document).ready(function() {
            $('.btnApprove, .btnReject,.btnBatal').on('click', function() {
                var id = $(this).data('id');
                var status = $(this).data('status');


                $.ajax({
                    url: '/debitur/' + id + '/fasilitas',
                    method: 'PATCH',
                    data: {
                        status: status
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 5000
                        })
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Failed to update status.');
                    }
                });
            });
        });
    </script>
@endpush
