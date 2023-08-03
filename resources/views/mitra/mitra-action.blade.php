<div class="modal-content">
    <form id="formAction" action="{{ $mitra->id ? route('mitra.update', $mitra->id) : route('mitra.store') }}"
        method="post">
        @csrf
        @if ($mitra->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah mitra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="namacabang" class="col-sm-2 col-form-label">Nama mitra</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $mitra->name }}"
                        id="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="tlp" value="{{ $mitra->tlp }}"
                        id="tlp">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="alamat" id="alamat">{{ $mitra->alamat }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Slik Mitra</label>
                <div class="col-sm-10">
                    <select class="form-control @error('statusSlik') is-invalid @enderror" name="statusSlik"
                        id="statusSlik">
                        <option value="0">--Select--</option>
                        <option value="1">Slik</option>
                        <option value="2">Non-Slik</option>
                    </select>
                    @error('statusSlik')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
