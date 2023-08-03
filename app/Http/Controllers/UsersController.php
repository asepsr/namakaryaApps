<?php

namespace App\Http\Controllers;

use App\DataTables\CabangDataTables;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UsersRequest;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Mitra;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

        public function __construct()
        {
        $this->middleware('can:create users')->only('create');
        $this->middleware('can:edit users')->only('edit');
        $this->middleware('can:update users')->only('update');
        $this->middleware('can:delete users')->only('destroy');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        $this->authorize('read users');
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $cabang = Cabang::all();
        $jabatan = Jabatan::all();
        $mitra = Mitra::all();
        return view('users.users-action',compact('role','jabatan','mitra','cabang'),['user'=>new User()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        
        $user = User::create($input);
        $user->assignRole($request->input('role'));
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
    public function edit(User $user)
    {
        $role = Role::all();
        $cabang = Cabang::all();
        $jabatan = Jabatan::all();
        $mitra = Mitra::all();
        return view('users.users-action',compact('user','role','jabatan','mitra','cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {
        //  dd($request->all());
         $user->name = $request->name;
         $user->email = $request->email;
         $user->cabang_id = $request->cabang_id;
         $user->mitra_id = $request->mitra_id;
         $user->jabatan_id = $request->jabatan_id;
         $user->save();
         
         return response()->json([
         'status' => 'success',
         'message' => 'Data berhasil diupdate'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
          return response()->json([
          'status'=>'success',
          'message'=>'Data berhasil dihapus'
          ]);
    }
}
