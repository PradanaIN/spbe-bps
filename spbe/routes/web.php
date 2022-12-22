<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PengelolaanController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\PersetujuanUsulanController;
use App\Http\Controllers\UsulanPerencanaanController;
use App\Http\Controllers\PersetujuanLaporanController;

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

// login routes
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class,'index' ])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate' ]);

// Group auth routes
Route::middleware(['revalidateBackHistory', 'nocache', 'auth'])->group(function(){
    // Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::post('/logout', [LoginController::class, 'logout']);
    // routes for slug automatically
    Route::get('/perencanaan-kegiatan/checkSlug', [PerencanaanController::class, 'checkSlug']);
    Route::get('/usulan-kegiatan/checkSlug', [UsulanController::class, 'checkSlug']);
    Route::get('/pengelolaan-kegiatan/checkSlug', [PengelolaanController::class, 'checkSlug']);
    Route::get('/persetujuan-usulan/checkSlug', [PersetujuanUsulanController::class, 'checkSlug']);
    Route::get('/role/checkSlug', [UserController::class, 'checkSlug']);

    // perencanaan routes
    // Route::get('/perencanaan-kegiatan', [PerencanaanController::class, 'index'])->name('perencanaan.index');
    // Route::get('/perencanaan-kegiatan/create', [PerencanaanController::class, 'create'])->name('perencanaan.create');
    Route::post('/perencanaan-kegiatan', [PerencanaanController::class, 'store']);
    Route::get('/perencanaan-kegiatan/{perencanaan_kegiatan}/assign', [PerencanaanController::class, 'assign']);
    Route::post('/perencanaan-kegiatan/{perencanaan_kegiatan}/assign', [PerencanaanController::class, 'assignStore']);
    // Route::get('/perencanaan-kegiatan/{slug}', [PerencanaanController::class, 'show'])->name('perencanaan.show');
    Route::resource('/perencanaan-kegiatan', PerencanaanController::class);

    // usulan routes
    Route::resource('/usulan-kegiatan', UsulanController::class);

    // pengelolaan routes
    Route::get('/pengelolaan-kegiatan/laporan', [PengelolaanController::class, 'laporan']);
    Route::resource('/pengelolaan-kegiatan', PengelolaanController::class);
    Route::get('/pengelolaan-kegiatan/kabkota/{pengelolaan_kegiatan}', [PengelolaanController::class, 'showKabkota']);
    Route::post('/pengelolaan-kegiatan/create', [PengelolaanController::class, 'create']);
    Route::post('/pengelolaan-kegiatan/{id}', [PengelolaanController::class, 'store']);
    Route::post('/pengelolaan-kegiatan/laporan/{id}', [PengelolaanController::class, 'storeLaporan']);
    Route::post('/pengelolaan-kegiatan/revisi/{id}', [PengelolaanController::class, 'storeRevisi']);
    // Route::get('/detail-progress/{id}', [PengelolaanController::class, 'detailProgress']);
    Route::get('/pengelolaan-kegiatan/rincian-perkembangan', function () {
        return view('pengelolaan.perkembangan');
    });

    // progress routes
    Route::resource('/progress-kegiatan', ProgressController::class);

    // persetujuan routes
    // kegiatan
    Route::resource('/persetujuan-laporan', PersetujuanLaporanController::class);
    Route::post('/persetujuan-laporan', [PersetujuanLaporanController::class, 'update']);
    Route::get('/persetujuan-laporan/kabkot/{persetujuan_laporan}', [PersetujuanLaporanController::class, 'showKabkota']);
    Route::put('/persetujuan-laporan/kabkot/{persetujuan_laporan}', [PersetujuanLaporanController::class, 'updateKabkota']);

    // usulan
    Route::resource('/persetujuan-usulan', PersetujuanUsulanController::class);
    Route::post('/persetujuan-usulan', [PersetujuanUsulanController::class, 'update']);
    Route::get('/perencanaan-usulan/{id}', [PersetujuanUsulanController::class]);

    // usulan agar masuk ke perencanaan
    Route::resource('/usulan-perencanaan', UsulanPerencanaanController::class);
    Route::get('/perencanaan-usulan/{id}', [PersetujuanUsulanController::class]);

    // usulan agar masuk ke perencanaan
    Route::resource('/usulan-perencanaan', UsulanPerencanaanController::class);

    // role routes
    Route::resource('/role', UserController::class);
});
