<div class="modal-content">
    <form id="formAction"
        action="{{ $accountofficer->id ? route('accountofficer.update', $accountofficer->id) : route('accountofficer.store') }}"
        method="post">
        @csrf
        @if ($accountofficer->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Cabang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cabang</label>
                <div class="col-sm-10">
                    <select class="form-control" id="cabang" name="cabang_id">
                        <option value="">---Select---</option>
                        @foreach ($cabang as $cabang)
                            <option value="{{ $cabang->id }}"
                                {{ $cabang->id == $accountofficer->cabang_id ? 'selected' : '' }}>
                                {{ $cabang->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="namacabang" class="col-sm-2 col-form-label">Nama OA</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $accountofficer->name }}"
                        id="cabangName">
                </div>
            </div>
            <div class="form-group row">
                <label for="spv" class="col-sm-2 col-form-label">Nama SPV</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="spv" value="{{ $accountofficer->spv }}"
                        id="spv">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="tlp" value="{{ $accountofficer->tlp }}"
                        id="tlp">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="alamat" id="alamat">{{ $accountofficer->alamat }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
