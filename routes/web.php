<?php

use App\Http\Controllers\AnalisController;
use App\Http\Controllers\AoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\DebitursController;
use App\Http\Controllers\DisburseController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlikController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/link', function () {        
//   $target = '/home/namastra/Laravel/storage';
//   $shortcut = '/home/namastra/public_html/public/storage';
//   symlink($target, $shortcut);
// });


Route::get('/link', function () {
    $target = '/home/namastra/Laravel/storage/app/public';
    $shortcut = '/home/namastra/public_html/storage';
    symlink($target, $shortcut);
});


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    } else {
        return view('auth.login');
    }
});

// Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Auth::routes(['verify' => true]);


// Route::get('/home', function () {
//     return view('home');
//     })->middleware(['auth', 'verified'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    // Route::get('index',[HomeController::class])->middleware(['auth','verified'])->name('home');
    Route::get('trashBiaya', [BiayaController::class, 'trashBiaya'])->name('trashBiaya');
    Route::post('{id}/restoreBiaya', [BiayaController::class, 'restoreBiaya'])->name('restoreBiaya');
    Route::delete('{id}/delete-permanent-biaya', [BiayaController::class, 'deletePermanentBiaya'])->name('deletePermanentBiaya');
    Route::get('trash', [DebiturController::class, 'trash'])->name('trash');
    Route::post('{id}/restore', [DebiturController::class, 'restore'])->name('restore');
    Route::delete('{id}/delete-permanent', [DebiturController::class, 'deletePermanent'])->name('deletePermanent');
    Route::resource('users', UsersController::class);
    Route::resource('cabang', CabangController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('menu', NavigationController::class);
    Route::resource('permission', PermissionController::class);
    route::resource('mitra', MitraController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('accountofficer', AoController::class);
    Route::resource('perusahaan', PerusahaanController::class);
    Route::resource('disbursement', DisburseController::class);
    Route::resource('debitur', DebiturController::class);
    Route::resource('biaya', BiayaController::class);
    Route::post('disbursement/getdata', [DisburseController::class, 'getdata'])->name('disbursement.getdata');
    Route::post('disbursement/media', [DisburseController::class, 'storeMedia'])->name('disbursement.storeMedia');
    Route::get('disbursement/{noFasilitas}/downloadberkas', [DisburseController::class, 'downloadberkas']);
    Route::get('disbursement/{noFasilitas}', [DisburseController::class, 'show'])->name('disbursement.show');
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('fasilitas/{noFasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('fasilitas/{noFasilitas}', [FasilitasController::class, 'approve'])->name('fasilitas.approve');
    Route::put('fasilitas/{noFasilitas}/tolak', [FasilitasController::class, 'tolak'])->name('fasilitas.tolak');
    Route::get('fasilitas/{id}/downloadberkas', [FasilitasController::class, 'downloadberkas']);
    Route::post('debitur/media', [DebiturController::class, 'storeMedia'])->name('debitur.storeMedia');
    Route::post('debitur/akad', [DebiturController::class, 'akadstoreMedia'])->name('debitur.akadstoreMedia');
    Route::get('debitur/{id}/download', [DebiturController::class, 'download']);
    Route::get('debitur/{id}/downloadberkas', [DebiturController::class, 'downloadberkas']);
    Route::get('debitur/{id}/pengajuanMitra', [DebiturController::class, 'pengajuanMitra']);
    Route::put('debitur/{id}/ajukan', [DebiturController::class, 'ajukan'])->name('debitur.ajukan');
    Route::get('debitur/{id}/hasilMitra', [DebiturController::class, 'hasilMitra'])->name('debitur.hasilMitra');
    Route::put('debitur/{id}/kirim', [DebiturController::class, 'kirim'])->name('debitur.kirim');
    Route::put('debitur/{id}/simpanakad', [DebiturController::class, 'simpanakad'])->name('debitur.simpanakad');
    Route::get('debitur/{id}/uploadakad', [DebiturController::class, 'uploadakad'])->name('debitur.uploadakad');
    Route::patch('debitur/{nofasilitas}/fasilitas', [DebiturController::class, 'updateFasilitas'])->name('debitur.updateFasilitas');
    Route::get('slik/dataslik', [SlikController::class, 'dataslik'])->name('slik.dataslik');
    Route::get('slik/allslik', [SlikController::class, 'allslik'])->name('slik.allslik');
    Route::get('slik/{id}/cekslik', [SlikController::class, 'cekslik']);
    Route::put('slik/{id}/', [SlikController::class, 'update'])->name('slik.update');
    Route::post('analis/getdata', [AnalisController::class, 'getdata'])->name('analis.getdata');
    Route::get('analis', [AnalisController::class, 'index'])->name('analis.index');
    Route::post('analis', [AnalisController::class, 'store'])->name('analis.store');
    Route::get('analis/dtanalis', [AnalisController::class, 'dtanalis'])->name('analis.dtanalis');
    Route::get('analis/{id}/mppanalis', [AnalisController::class, 'mppanalis'])->name('analis.mppanalis');
});
