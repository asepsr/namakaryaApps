<div class="modal-content">
    <form id="formAction"
        action="{{ $perusahaan->id ? route('perusahaan.update', $perusahaan->id) : route('perusahaan.store') }}"
        method="post">
        @csrf
        @if ($perusahaan->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Perusahaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="mitraPekerja" class="col-sm-2 col-form-label">Mitra Pekerja</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="mitraPekerja"
                        value="{{ $perusahaan->mitraPekerja }}" id="mitraPekerja">
                </div>
            </div>
            <div class="form-group row">
                <label for="kopkar" class="col-sm-2 col-form-label">Kopkar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="kopkar" value="{{ $perusahaan->kopkar }}"
                        id="kopkar">
                </div>
            </div>
            <div class="form-group row">
                <label for="noPks" class="col-sm-2 col-form-label">Nomor PKS</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="noPks" value="{{ $perusahaan->noPks }}"
                        id="noPks">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Tanggal Pks</label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" value="{{ $perusahaan->tglPks }}" id="tglPks"
                        name="tglPks">
                </div>
            </div>
            <div class="form-group row">
                <label for="noPks" class="col-sm-2 col-form-label">Lama PKS</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="lamaPks" value="{{ $perusahaan->lamaPks }}"
                        id="lamaPks">
                </div>
            </div>
            <div class="form-group row">
                <label for="namaPerusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="namaPerusahaan"
                        value="{{ $perusahaan->namaPerusahaan }}" id="namaPerusahaan">
                </div>
            </div>
            <div class="form-group row">
                <label for="metodeAngsuran" class="col-sm-2 col-form-label">Metode Angsuran</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="metodeAngsuran"
                        value="{{ $perusahaan->metodeAngsuran }}" id="metodeAngsuran">
                </div>
            </div>
            <div class="form-group row">
                <label for="namaPic" class="col-sm-2 col-form-label">Nama PIC</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="namaPic" value="{{ $perusahaan->namaPic }}"
                        id="namaPic">
                </div>
            </div>
            <div class="form-group row">
                <label for="jabatanPic" class="col-sm-2 col-form-label">Jabatan PIC</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="jabatanPic" value="{{ $perusahaan->jabatanPic }}"
                        id="jabatanPic">
                </div>
            </div>
            <div class="form-group row">
                <label for="contactPic" class="col-sm-2 col-form-label">Contact PIC</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="contactPic" value="{{ $perusahaan->contactPic }}"
                        id="contactPic">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cabang</label>
                <div class="col-sm-10">
                    <select class="form-control" id="cabang" name="cabang_id">
                        <option value="">---Select---</option>
                        @foreach ($cabang as $cabang)
                            <option value="{{ $cabang->id }}"
                                {{ $cabang->id == $perusahaan->cabang_id ? 'selected' : '' }}>
                                {{ $cabang->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
