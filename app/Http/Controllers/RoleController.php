<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create roles')->only('create');
        $this->middleware('can:edit roles')->only('edit');
        $this->middleware('can:update roles')->only('update');
        $this->middleware('can:delete roles')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $datatable)
    {
        $this->authorize('read roles');
        $role= Role::latest()->get();
        return $datatable->render('role.index',['roles'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();
        return view('role.role-action',compact('permission'),['role'=>new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $input = $request->all();
        // dd($input);


        $role = Role::create($input);
        $role->syncPermissions($request->input('permission'));
        return response()->json([
            'status'=>'success',
            'message'=>'Data berhasil di tambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permission = Permission::all();
        $rolePermissions = DB ::table("role_has_permissions")->where("role_has_permissions.role_id",$role)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('role.role-action',compact('permission','role','rolePermissions'));

        //  $role = Role::find($id);
        //  $permission = Permission::get();
        //  $rolePermissions = DB ::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //  ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //  ->all();

        //  return view('role.role-action',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->name =$request->name;
        $role->guard_name =$request->guard_name;
        $role->save();

         $role->syncPermissions($request->input('permission'));

        return response()->json([
            'status'=>'sucsses',
            'message'=>'Data Berhasil di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
          $role->delete();
          return response()->json([
          'status'=>'success',
          'message'=>'Data berhasil dihapus'
          ]);
    }
}
