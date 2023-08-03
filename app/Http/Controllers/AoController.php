<?php

namespace App\Http\Controllers;

use App\DataTables\AccountOfficerDataTable;
use App\Http\Requests\AccountRequest;
use App\Models\AccountOfficer;
use App\Models\Cabang;
use Illuminate\Http\Request;

class AoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create accountofficer')->only('create');
        $this->middleware('can:delete accountofficer')->only('destory');
        $this->middleware('can:update accountofficer')->only('update');
        $this->middleware('can:update accountofficer')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AccountOfficerDataTable $dataTable)
    {
        $this->authorize('read accountofficer');
        return $dataTable->render('accountofficer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = Cabang::all();
        return view('accountofficer.accountofficer-action', ['accountofficer' => new
            AccountOfficer()], compact('cabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {

        AccountOfficer::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil di tambahkan'
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
    public function edit(AccountOfficer $accountofficer)
    {
        $cabang = Cabang::all();
        return view('accountofficer.accountofficer-action', compact('accountofficer', 'cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, AccountOfficer $accountofficer)
    {
        $accountofficer->cabang_id = $request->cabang_id;
        $accountofficer->name = $request->name;
        $accountofficer->tlp = $request->tlp;
        $accountofficer->alamat = $request->alamat;
        $accountofficer->save();

        return response()->json([
            'status' => 'sucsses',
            'message' => 'Data Berhasil di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountOfficer $accountofficer)
    {
        $accountofficer->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
