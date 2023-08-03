<div class="modal-content">
    <form id="formAction" action="{{ $biaya->id ? route('biaya.update', $biaya->id) : route('biaya.store') }}"
        method="post">
        @csrf
        @if ($biaya->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Biaya</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="namaBiaya" class="col-sm-2 col-form-label">Tabel Biaya</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="namaBiaya" value="{{ $biaya->namaBiaya }}"
                        id="namaBiaya">
                </div>
            </div>
            <div class="form-group row">
                <label for="bunga" class="col-sm-2 col-form-label">Bunga</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" step=".01" name="bunga" value="{{ $biaya->bunga }}"
                        id="bunga">
                </div>
            </div>
            <div class="form-group row">
                <label for="provisi" class="col-sm-2 col-form-label">Provisi</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="provisi" value="{{ $biaya->provisi }}"
                        id="provisi">
                </div>
            </div>
            <div class="form-group row">
                <label for="admin" class="col-sm-2 col-form-label">Administrasi</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="admin" value="{{ $biaya->admin }}"
                        id="admin">
                </div>
            </div>
            <div class="form-group row">
                <label for="asuransi" class="col-sm-2 col-form-label">Asuransi</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="asuransi" value="{{ $biaya->asuransi }}"
                        id="asuransi">
                </div>
            </div>
            <div class="form-group row">
                <label for="notaris" class="col-sm-2 col-form-label">Notaris</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="notaris" value="{{ $biaya->notaris }}"
                        id="notaris">
                </div>
            </div>
            <div class="form-group row">
                <label for="simpPokok" class="col-sm-2 col-form-label">Simpana Pokok</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="simpPokok" value="{{ $biaya->simpPokok }}"
                        id="simpPokok">
                </div>
            </div>
            <div class="form-group row">
                <label for="simpWajib" class="col-sm-2 col-form-label">Simpanan Wajib</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="simpWajib" value="{{ $biaya->simpWajib }}"
                        id="simpWajib">
                </div>
            </div>
            <div class="form-group row">
                <label for="tabungan" class="col-sm-2 col-form-label">Tabungan</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="tabungan" value="{{ $biaya->tabungan }}"
                        id="tabungan">
                </div>
            </div>
            <div class="form-group row">
                <label for="hold" class="col-sm-2 col-form-label">Hold Angsuran</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="hold" value="{{ $biaya->hold }}"
                        id="hold">
                </div>
            </div>
            <div class="form-group row">
                <label for="materai" class="col-sm-2 col-form-label">Biaya Materai</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="materai" value="{{ $biaya->materai }}"
                        id="materai">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
