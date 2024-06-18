<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi');
});

// guru
Route::get('guru', [GuruController::class, 'guru'])->name('guru');
Route::post('guru', [GuruController::class, 'guru_aksi'])->name('guru.action');
Route::post('delete-guru/{id}', [GuruController::class, 'hapusguru'])->name('guru.hapusguru');
Route::get('guru/edit/{id}', [GuruController::class, 'editguru'])->name('guru.editguru');
Route::post('guru/update/{id}', [GuruController::class, 'updateguru'])->name('guru.updateguru');

// Siswa
Route::get('siswa', [SiswaController::class, 'siswa'])->name('siswa');
Route::post('siswa', [SiswaController::class, 'siswa_aksi'])->name('siswa.action');
Route::post('delete-siswa/{id}', [SiswaController::class, 'hapussiswa'])->name('siswa.hapussiswa');
Route::post('siswa/update/{id}', [SiswaController::class, 'updatesiswa'])->name('siswa.updatesiswa');

// Mata Pelajaran
Route::get('mapel', [MapelController::class, 'mapel'])->name('mapel');
Route::post('mapel', [MapelController::class, 'mapel_aksi'])->name('mapel.action');
Route::post('delete-mapel/{id}', [MapelController::class, 'hapusmapel'])->name('mapel.hapusmapel');
Route::post('mapel/update/{id}', [MapelController::class, 'updatemapel'])->name('mapel.updatemapel');

// Route::post('guru', [SemesterController::class, 'guru_aksi'])->name('guru.action');
// Route::post('delete-guru/{id}', [SemesterController::class, 'hapusguru'])->name('guru.hapusguru');

// semester
Route::get('semester', [SemesterController::class, 'semester'])->name('semester');
// Route::post('guru', [SemesterController::class, 'guru_aksi'])->name('guru.action');
// Route::post('delete-guru/{id}', [SemesterController::class, 'hapusguru'])->name('guru.hapusguru');

// jurusan
Route::get('jurusan', [JurusanController::class, 'jurusan'])->name('jurusan');
// Route::post('guru', [SemesterController::class, 'guru_aksi'])->name('guru.action');
// Route::post('delete-guru/{id}', [SemesterController::class, 'hapusguru'])->name('guru.hapusguru');

// hasil
Route::get('hasil', [HasilController::class, 'hasil'])->name('hasil');
// Route::post('guru', [SemesterController::class, 'guru_aksi'])->name('guru.action');
// Route::post('delete-guru/{id}', [SemesterController::class, 'hapusguru'])->name('guru.hapusguru');




// Route::post('delete-guru/{id}', [SemesterController::class, 'hapusguru'])->name('guru.hapusguru');

