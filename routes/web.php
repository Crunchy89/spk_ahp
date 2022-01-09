<?php

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

Route::get('/', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('ceklogin');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/getMenu', [\App\Http\Controllers\DashboardController::class, 'getMenu'])->name('getmenu');

    Route::prefix('role')->group(function () {
        Route::get('/', [\App\Http\Controllers\RoleController::class, 'index'])->name('role');
        Route::post('/aksi', [\App\Http\Controllers\RoleController::class, 'aksi'])->name('role.aksi');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('user');
        Route::post('/aksi', [\App\Http\Controllers\UserController::class, 'aksi'])->name('user.aksi');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
        Route::get('/submenu/{id}', [\App\Http\Controllers\SubmenuController::class, 'index'])->name('submenu');
        Route::post('/aksi', [\App\Http\Controllers\MenuController::class, 'aksi'])->name('menu.aksi');
        Route::post('/submenu/{id}/aksi', [\App\Http\Controllers\SubmenuController::class, 'aksi'])->name('submenu.aksi');
    });
    Route::prefix('akses')->group(function () {
        Route::get('/', [\App\Http\Controllers\AksesController::class, 'index'])->name('akses');
        Route::get('/edit/{id}', [\App\Http\Controllers\AksesController::class, 'edit'])->name('akses.edit');
        Route::post('/check/{id}', [\App\Http\Controllers\AksesController::class, 'check'])->name('akses.check');
    });
    Route::prefix('kriteria')->group(function () {
        Route::get('/', [\App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria');
        Route::post('/aksi', [\App\Http\Controllers\KriteriaController::class, 'aksi'])->name('kriteria.aksi');
    });
    Route::prefix('alternatif')->group(function () {
        Route::get('/', [\App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif');
        Route::post('/aksi', [\App\Http\Controllers\AlternatifController::class, 'aksi'])->name('alternatif.aksi');
    });
    Route::prefix('nilai')->group(function () {
        Route::get('/', [\App\Http\Controllers\AlternatifController::class, 'nilai'])->name('nilai');
        Route::post('/simpan', [\App\Http\Controllers\AlternatifController::class, 'simpan'])->name('nilai.simpan');
        Route::get('/perbandingan/{id}', [\App\Http\Controllers\PerbandinganController::class, 'index'])->name('nilai.perbandingan');
        Route::post('/perbandingan/{id}/simpan', [\App\Http\Controllers\PerbandinganController::class, 'simpan'])->name('nilai.perbandingan.simpan');
    });
    Route::prefix('ahp')->group(function () {
        Route::get('/', [\App\Http\Controllers\AhpController::class, 'index'])->name('ahp');
        Route::post('/simpan', [\App\Http\Controllers\AhpController::class, 'simpan'])->name('ahp.simpan');
        Route::post('/aksi', [\App\Http\Controllers\AhpController::class, 'aksi'])->name('ahp.aksi');
    });
    Route::prefix('rangking')->group(function () {
        Route::get('/', [\App\Http\Controllers\RangkingController::class, 'index'])->name('rangking');
    });
    Route::prefix('manual')->group(function () {
        Route::get('/', [\App\Http\Controllers\ManualController::class, 'index'])->name('manual');
    });
    Route::prefix('profil')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
    });
    Route::prefix('cetak')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProfilController::class, 'index'])->name('cetak');
    });
});
