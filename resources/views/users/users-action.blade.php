<div class="modal-content">
    <form id="formAction" action="{{ $user->id ? route('users.update', $user->id) : route('users.store') }}"
        method="post">
        @csrf
        @if ($user->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="nameUsers" class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}"
                        id="usersName">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="email" value="{{ $user->email }}"
                        id="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" value="{{ $user->password }}" name="password"
                        id="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Password Comfirmasi</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" value="{{ $user->password }}"
                        name="password_confirmation" id="password-confirm">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Privilage</label>
                <div class="col-sm-10">
                    <select class="form-control" id="privilage" name="privilage">
                        <option value="">---Select---</option>
                        <option value="1">Namastra</option>
                        <option value="2">Mitra</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cabang</label>
                <div class="col-sm-10">
                    <select class="form-control" id="cabang" name="cabang_id">
                        <option value="">---Select---</option>
                        @foreach ($cabang as $cabang)
                            <option value="{{ $cabang->id }}" {{ $cabang->id == $user->cabang_id ? 'selected' : '' }}>
                                {{ $cabang->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mitra</label>
                <div class="col-sm-10">
                    <select class="form-control" id="mitra" name="mitra_id">
                        <option value="">---Select---</option>
                        @foreach ($mitra as $mitra)
                            <option value="{{ $mitra->id }}" {{ $mitra->id == $user->mitra_id ? 'selected' : '' }}>
                                {{ $mitra->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jabatan" name="jabatan_id">
                        <option value="">---Select---</option>
                        @foreach ($jabatan as $jabatan)
                            <option value="{{ $jabatan->id }}"
                                {{ $jabatan->id == $user->jabatan_id ? 'selected' : '' }}>{{ $jabatan->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role">
                        <option value="">---Select---</option>
                        @foreach ($role as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->role ? 'selected' : '' }}>
                                {{ $role->name }}</option>
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
