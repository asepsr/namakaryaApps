<div class="modal-content">
    <form id="formAction" action="" method="post">
        {{-- @csrf
        @if ($cabang->id)
            @method('PUT')
        @endif --}}
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="namacabang" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="" id="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="url" value="" id="url">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="icon" value="" id="icon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Submenu</label>
                <div class="col-sm-10">
                    <select class="form-control" name="">
                        <option value="">---Select---</option>
                        @foreach (getMenus() as $menu)
                            <option value="{{ $menu->id }}">
                                {{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label for="tlp" class="col col-form-label text-danger">* Note : Apabila tidak memilih submenu maka
                nama menu
                akan menjadi main menu </label>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
