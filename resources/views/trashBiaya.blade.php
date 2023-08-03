@extends('layouts.master')

@section('content')
    <div class="mx-auto border-bottom mb-3">
        <h1 class="text-center">Soft Delete Laravel</h1>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col-3">No.</th>
                <th scope="col">Nama Biaya</th>
                <th scope="col">Restore</th>
                <th scope="col">Delete Permanent</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($biaya as $biaya)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $biaya->namaBiaya }}</td>
                    <td>
                        <form method="POST" action="{{ route('restoreBiaya', [$biaya->id]) }}" class="d-inline">
                            @csrf
                            <input type="submit" value="Restore" class="btn btn-success" />
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('deletePermanentBiaya', [$biaya->id]) }}" class="d-inline"
                            onsubmit="return confirm('Delete this data permanently ?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        new DataTable('#example');
    </script>
@endpush
