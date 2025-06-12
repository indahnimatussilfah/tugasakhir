<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DalakesController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\DataArtikelController;
use App\Http\Controllers\DataPenyakitController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\admindashboardController;
use App\Http\Controllers\Admin\KelolaAkunController;
use App\Http\Controllers\FasilitasLayananController;
use App\Http\Controllers\GisController;
use App\Http\Controllers\MonitoringPenyakitController;
use App\Http\Controllers\GrafikPetugasAnalisController;
use App\Http\Controllers\MonitoringPelaporanController;
use App\Http\Controllers\PetugasanaliDashboardController;
use App\Http\Controllers\PetugasKesehatanDashboardController;
use App\Http\Controllers\RegisterMasyarakatController;
use App\Http\Controllers\RegisterPetugasKesehatanController;

Route::get('/', function () {
    return view('admin.layouts.app');
}); 

Route::get('/', [admindashboardController::class, 'index'])->name('dashboardAdmin.index');

Route::get('/petugasanalis', function () {
    return view('petugasanalis.layouts.app');
}); 

Route::get('/petugasanalis', [PetugasanaliDashboardController::class, 'index'])->name('dashboardPetugasanalis.index');

// Route::get('/petugaskesehatan', function () {
//     return view('petugaskesehatan.layouts.app');
// }); 

Route::get('/petugaskesehatan', [PetugasKesehatanDashboardController::class, 'index'])->name('dashboardPetugasKesehatan.index');




Route::get('/home', [homeController::class, 'index'])->name('home.index');
Route::get('/gis', [GisController::class, 'index'])->name('gis.index');

// Route::get('/pelaporan', function () {
//     return view('pelaporan')// Halaman Form Pelaporan
// });
Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

Route::get('/pelaporan', [PelaporanController::class, 'index'])->name('pelaporan.index');
Route::post('/pelaporan', [PelaporanController::class, 'store'])->name('pelaporan.store');
Route::get('/pelaporan/{id}', [PelaporanController::class, 'edit'])->name('pelaporan.edit');
// Route::post('/pelaporan', [PelaporanController::class, 'update'])->name('pelaporan.update');
Route::get('/pelaporan/{id}/detail-pelaporan', [PelaporanController::class, 'show'])->name('pelaporan.show');
Route::put('/pelaporan/{id}/update-pelaporan', [PelaporanController::class, 'update'])->name('pelaporan.update');


// Route::get('/dashboard', function () {
//     return view('admin.pages.dashboard');
// });


// Route::prefix('admin/kelolaakun')->name('kelolaakun.')->group(function () {
//     Route::get('/kelolaakun', [KelolaAkunController::class, 'index'])->name('index');
//     Route::get('/create', [KelolaAkunController::class, 'create'])->name('create');
//     Route::post('/', [KelolaAkunController::class, 'store'])->name('store');
//     Route::get('/{user}/edit', [KelolaAkunController::class, 'edit'])->name('edit');
//     Route::put('/{user}', [KelolaAkunController::class, 'update'])->name('update');
//     Route::delete('/{user}', [KelolaAkunController::class, 'destroy'])->name('destroy');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/grafikk', [GrafikPetugasAnalisController::class, 'index'])->name('garfik.index');

// Route::get('/laporanpenyakit', [DataPenyakitController::class, 'index'])->name('laporanpenyakit.index');

Route::get('/dalakes', [DalakesController::class, 'index'])->name('dalakes.index');
Route::get('/search', [DalakesController::class, 'search'])->name('dalakes.search');



Route::get('/dataartikel', [DataArtikelController::class, 'index'])->name('dataartikel.index');

Route::get('/dataartikel/create', [DataArtikelController::class, 'create'])->name('dataartikel.create');

Route::post('/dataartikel', [DataArtikelController::class, 'store'])->name('dataartikel.store');

// Tampilkan form edit
Route::get('/dataartikel/{id}', [DataArtikelController::class, 'edit'])->name('dataartikel.update');

// Update artikel
Route::put('/dataartikel/{id}', [DataArtikelController::class, 'update'])->name('dataartikel.update');

// Hapus artikel
Route::delete('/dataartikel/{id}', [DataArtikelController::class, 'destroy'])->name('dataartikel.destroy');

Route::get('/dataakun', [DataAkunController::class, 'index'])->name('dataakun.index');
Route::get('/dataakun/create', [DataAkunController::class, 'create'])->name('dataakun.create');
Route::post('/dataakun', [DataAkunController::class, 'store'])->name('dataakun.store');
Route::get('/dataakun/{id}/edit', [DataAkunController::class, 'edit'])->name('dataakun.edit');
Route::put('/dataakun/{id}', [DataAkunController::class, 'update'])->name('dataakun.update');
Route::delete('/dataakun/{id}', [DataAkunController::class, 'destroy'])->name('dataakun.destroy');
Route::get('/dataakun/export/excel', [DataAkunController::class, 'exportDataAkunToExcel'])->name('dataakun.export');


Route::get('/datapenyakit', [DataPenyakitController::class, 'index'])->name('datapenyakit.index');
Route::get('/searchDataPenyakit', [DataPenyakitController::class, 'searchPenyakit'])->name('datapenyakit.search');

Route::get('/datapenyakit/create', [DataPenyakitController::class, 'create'])->name('datapenyakit.create');

Route::post('/datapenyakit', [DataPenyakitController::class, 'store'])->name('datapenyakit.store');


// Tampilkan form edit
Route::get('/datapenyakit/{id}', [DataPenyakitController::class, 'edit'])->name('datapenyakit.edit');

// Update artikel
Route::put('/datapenyakit/{id}', [DataPenyakitController::class, 'update'])->name('datapenyakit.update');

Route::delete('/datapenyakit/{id}', [DataPenyakitController::class, 'destroy'])->name('datapenyakit.destroy');

Route::get('/datapenyakit/export/excel', [DataPenyakitController::class, 'exportDataPenyakitToExcel'])->name('datapenyakit.export');

// Route::get('/monitoringpelaporan', [MonitoringPelaporanController::class, 'index'])->name('monitorlap.index');
// Route::put('/monitoringpelaporan/{id}', [MonitoringPelaporanController::class, 'update'])->name('monitorlap.update');
// Route::get('/monitoringpelaporan/proses/{id}', [MonitoringPelaporanController::class, 'create'])->name('monitorlap.createproses');
// Route::put('/monitoringlaporan/{id}/proses', [MonitoringPelaporanController::class, 'prosesStore'])->name('proses.store');

Route::get('/monitoringpelaporan', [MonitoringPelaporanController::class, 'index'])->name('monitorlap.index');

Route::put('/monitoringpelaporan/{id}', [MonitoringPelaporanController::class, 'update'])->name('monitorlap.update');

Route::get('/monitoringpelaporan/proses/{id}', [MonitoringPelaporanController::class, 'create'])->name('monitorlap.createproses');

Route::put('/monitoringpelaporan/{id}/proses', [MonitoringPelaporanController::class, 'process'])->name('proses.store');


 Route::get('/penyakit/export/{id}', [MonitoringPelaporanController::class, 'export'])->name('penyakit.export');



Route::get('/monitoringpenyakit', [MonitoringPenyakitController::class, 'index'])->name('monitoringpenyakit.index');
// Route::post('/monitoring/process', [MonitoringPelaporanController::class, 'process'])->name('monitoring.process');
Route::get('/reports/{id}/process', [MonitoringPelaporanController::class, 'showProcessForm'])->name('reports.process.form');
Route::post('/reports/{id}/process', [MonitoringPelaporanController::class, 'process'])->name('reports.process');

Route::get('/fasilitaslayanan', [FasilitasLayananController::class, 'index'])->name('fasilitaslayanan.index');

Route::get('/register', [RegisterController::class, 'showRegisterOption'])->name('registration.option');
Route::resource('register-petugas-kesehatan', RegisterPetugasKesehatanController::class);
Route::resource('register-masyarakat', RegisterMasyarakatController::class);
// Route::post('/register', [RegisterController::class, 'register'])->name('registration.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');



Route::get('/dalakes', [DalakesController::class, 'index'])->name('dalakes.index');
Route::get('/dalakes/create', [DalakesController::class, 'create'])->name('dalakes.create');

// Menyimpan data baru
Route::post('/dalakes', [DalakesController::class, 'store'])->name('dalakes.store');

// Menampilkan form edit
Route::get('/dalakes/{id}', [DalakesController::class, 'edit'])->name('dalakes.edit');

// Mengupdate data
Route::put('/dalakes/{id}', [DalakesController::class, 'update'])->name('dalakes.update');

// Menghapus data
Route::delete('/dalakes/{id}', [DalakesController::class, 'destroy'])->name('dalakes.destroy');


Route::post('/reports/{id}/process', [MonitoringPelaporanController::class, 'process'])->name('reports.process');



// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);



// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');


