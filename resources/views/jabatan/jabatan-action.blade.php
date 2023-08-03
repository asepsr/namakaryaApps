<div class="modal-content">
    <form id="formAction" action="{{ $jabatan->id ? route('jabatan.update', $jabatan->id) : route('jabatan.store') }}"
        method="post">
        @csrf
        @if ($jabatan->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah jabatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="namacabang" class="col-sm-2 col-form-label">Nama jabatan</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $jabatan->name }}"
                        id="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="divisi" value="{{ $jabatan->divisi }}"
                        id="divisi">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
