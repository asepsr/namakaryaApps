<div class="modal-content">
    <form id="formAction" action="{{ $cabang->id ? route('cabang.update', $cabang->id) : route('cabang.store') }}"
        method="post">
        @csrf
        @if ($cabang->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Cabang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="namacabang" class="col-sm-2 col-form-label">Nama Cabang</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $cabang->name }}"
                        id="cabangName">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="tlp" value="{{ $cabang->tlp }}"
                        id="tlp">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="alamat" id="alamat">{{ $cabang->alamat }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
