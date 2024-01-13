<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DependantDropdownController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login.mulai');


Route::middleware(['auth', 'auth.session'])->group(function () {

    //dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    //data mobil
    Route::get('/mobil', [App\Http\Controllers\MobilController::class, 'index'])->name('mobil.index');
    Route::get('/mobil-member', [App\Http\Controllers\MobilController::class, 'indexMobilMember'])->name('mobil.member.index');
    Route::post('/mobil',[App\Http\Controllers\MobilController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/create', [App\Http\Controllers\MobilController::class, 'create'])->name('mobil.create');
    Route::get('/mobil/{id}', [App\Http\Controllers\MobilController::class, 'show'])->name('mobil.show');
    Route::put('/mobil/{id}', [App\Http\Controllers\MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/mobil/{id}', [App\Http\Controllers\MobilController::class, 'destroy'])->name('mobil.destroy');
    Route::get('/mobil/{id}/edit', [App\Http\Controllers\MobilController::class, 'edit'])->name('mobil.edit');

    //data pinjam mobil - admin
    Route::get('/pinjam-mobil-admin', [App\Http\Controllers\DataPinjamMobilController::class, 'index'])->name('data.pinjam.mobil.index');
    Route::get('/pinjam-mobil-riwayat', [App\Http\Controllers\DataPinjamMobilController::class, 'riwayatPinjam'])->name('data.pinjam.mobil.riwayat');
    Route::get('/pinjam-mobil-kembali/{id}', [App\Http\Controllers\DataPinjamMobilController::class, 'kembali'])->name('data.pinjam.mobil.kembali');
    Route::put('/pinjam-mobil-kembali/{id}', [App\Http\Controllers\DataPinjamMobilController::class, 'kembaliStore'])->name('data.pinjam.mobil.kembali.store');



    //proses pinjam mobil - member 
    Route::get('/pinjam-mobil', [App\Http\Controllers\PinjamMobilController::class, 'index'])->name('pinjam.mobil.index');
    Route::post('/pinjam-mobil',[App\Http\Controllers\PinjamMobilController::class, 'store'])->name('pinjam.mobil.store');
    Route::post('/mobil-cari', [App\Http\Controllers\PinjamMobilController::class, 'comboBox'])->name('mobil.comboBox');
    Route::get('/get-lama-total', [App\Http\Controllers\PinjamMobilController::class, 'getLamaTotal'])->name('get.lama.total');




});

require __DIR__.'/auth.php';
