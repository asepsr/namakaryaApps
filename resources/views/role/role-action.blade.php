<div class="modal-content">
    <form id="formAction" action="{{ $role->id ? route('roles.update', $role->id) : route('roles.store') }}"
        method="post">
        @csrf
        @if ($role->id)
            @method('PUT')
        @endif
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="roleName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $role->name }}"
                        id="roleName">
                </div>
            </div>
            <div class="form-group row">
                <label for="guardName" class="col-sm-2 col-form-label">Guard</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="guard_name" value="{{ $role->guard_name }}"
                        id="guardName">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 my-2 control-label">Checkboxes</label>
                <div class="col-md-9">
                    @foreach ($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                    @endforeach
                </div>
            </div>
            <!--end row-->
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div><!-- /.modal-content -->
