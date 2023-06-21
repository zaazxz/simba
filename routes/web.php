<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\WhatsappController;

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

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ajax Jquery
Route::post('/getkabupaten', [UserController::class, 'kabkota'])->name('getkabupaten');
Route::post('/getkecamatan', [UserController::class, 'kecamatan'])->name('getkecamatan');
Route::post('/getkelurahan', [UserController::class, 'kelurahan'])->name('getkelurahan');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('gtk')->group(function () {

        // Route for Guru
        Route::get('/guru', [UserController::class, 'index'])->name('guru.index');
        Route::get('/non', [UserController::class, 'nonaktif'])->name('guru.non');
        Route::get('/aktif', [UserController::class, 'aktif'])->name('guru.aktif');
        Route::get('/edit/{code}', [UserController::class, 'edit'])->name('guru.edit');
        Route::put('/update/{code}', [UserController::class, 'update'])->name('guru.update');
        Route::get('/show/{code}', [UserController::class, 'show'])->name('guru.show');
        Route::get('/pending', [UserController::class, 'pending'])->name('guru.pending');
        Route::get('/aktif', [UserController::class, 'aktif'])->name('guru.aktif');
        Route::get('/create', [UserController::class, 'create'])->name('guru.create');
        Route::post('/store', [UserController::class, 'store'])->name('guru.store');
        Route::get('/delete/{code}', [UserController::class, 'destroy'])->name('guru.destroy');
        Route::get('/status/{code}', [UserController::class, 'status'])->name('guru.status');

        // Route for Tata Usaha
        Route::get('/stu', [UserController::class, 'tatausaha'])->name('tatausaha.index');
        Route::get('/tu_non', [UserController::class, 'tu_nonaktif'])->name('tatausaha.non');
        Route::get('/tu_aktif', [UserController::class, 'tu_aktif'])->name('tatausaha.aktif');
        Route::get('/editu/{code}', [UserController::class, 'stu_edit'])->name('tatausaha.edit');
        Route::put('/updatetu/{code}', [UserController::class, 'stu_update'])->name('tatausaha.update');
        Route::get('/deletetu/{code}', [UserController::class, 'stu_destroy'])->name('tatausaha.destroy');
        Route::get('/statustu/{code}', [UserController::class, 'stu_status'])->name('tatausaha.status');

    });

    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::get('/today', [JadwalController::class, 'today'])->name('jadwal.today');
        Route::get('/tommorow', [JadwalController::class, 'besok'])->name('jadwal.tommorow');
        Route::post('/import', [JadwalController::class, 'import'])->name('jadwal.import');
    });

    Route::prefix('kelas')->group(function()  {
        Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::get('/nonaktif', [KelasController::class, 'nonaktif'])->name('kelas.non');
        Route::get('/aktif', [KelasController::class, 'aktif'])->name('kelas.aktif');
        Route::get('/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::put('/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
        Route::get('/delete/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
        Route::get('/status/{id}', [KelasController::class, 'status'])->name('kelas.status');
        Route::post('/store', [KelasController::class, 'store'])->name('kelas.store');
    });

    Route::prefix('mapel')->group(function()  {
        Route::get('/', [MapelController::class, 'index'])->name('mapel.index');
        Route::get('/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::get('/nonaktif', [MapelController::class, 'nonaktif'])->name('mapel.non');
        Route::get('/aktif', [MapelController::class, 'aktif'])->name('mapel.aktif');
        Route::get('/edit/{id}', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/update/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::get('/delete/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
        Route::get('/status/{id}', [MapelController::class, 'status'])->name('mapel.status');
        Route::post('/store', [MapelController::class, 'store'])->name('mapel.store');
    });

    Route::prefix('presensi')->group(function() {

        // Hadir
        Route::get('/hadir', [PresensiController::class, 'hadir'])->name('presensi.hadir');

        // Tidak Hadir
        Route::get('/tidak', [PresensiController::class, 'tidak'])->name('presensi.tidak');
        Route::post('/tidak/update/{id}', [PresensiController::class, 'update'])->name('presensi.update');
        Route::get('/tidak/destroy/{id}', [PresensiController::class, 'destroy'])->name('presensi.destroy');

        // Konfirmasi
        Route::get('/konfirmasi', [PresensiController::class, 'konfirmasi'])->name('presensi.konfirmasi');
        Route::post('/konfirmasi/store', [PresensiController::class, 'store'])->name('presensi.store');

    });

    Route::prefix('pengaturan')->group(function() {

        // User
        Route::get('/user', [PengaturanController::class, 'user'])->name('pengaturan.user.index');
        Route::get('/user/aktif', [PengaturanController::class, 'aktif'])->name('pengaturan.user.aktif');
        Route::get('/user/non', [PengaturanController::class, 'non'])->name('pengaturan.user.non');
        Route::get('/user/create', [PengaturanController::class, 'create'])->name('pengaturan.user.create');
        Route::post('/user/store', [PengaturanController::class, 'store'])->name('pengaturan.user.store');
        Route::get('/user/show/{code}', [PengaturanController::class, 'show'])->name('pengaturan.user.show');
        Route::get('/user/edit/{code}', [PengaturanController::class, 'edit'])->name('pengaturan.user.edit');
        Route::get('/user/delete/{code}', [PengaturanController::class, 'destroy'])->name('pengaturan.user.destroy');
        Route::put('/user/update/{code}', [PengaturanController::class, 'update'])->name('pengaturan.user.update');
        Route::get('/user/status/{code}', [PengaturanController::class, 'status'])->name('pengaturan.user.status');

        // Whatsapp Gateaway
        Route::get('/whatsapp', [WhatsappController::class, 'index'])->name('pengaturan.whatsapp.index');

        // Mesin Fingerprint
        Route::get('/mesin', [MesinController::class, 'index'])->name('pengaturan.mesin.index');

    });

    Route::get('/inbox', [PesanController::class, 'inbox'])->name('pesan.inbox');
    Route::get('/outbox', [PesanController::class, 'outbox'])->name('pesan.outbox');

});
