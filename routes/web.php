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
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenilaianController;
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

Route::get('registrasi', [UserController::class, 'registrasi'])->name('registrasi');
Route::post('registrasi', [UserController::class, 'registrasi_aksi'])->name('registrasi.action');
Route::post('registrasilogin', [UserController::class, 'registrasi_aksi_login'])->name('registrasi.action.login');
Route::post('delete-registrasi/{id}', [UserController::class, 'hapusregistrasi'])->name('registrasi.hapusregistrasi');
Route::post('registrasi/update/{id}', [UserController::class, 'updateregistrasi'])->name('registrasi.updateregistrasi');

Route::get('kehadiran', [PenilaianController::class, 'index'])->name('kehadiran');
Route::post('kehadiran', [PenilaianController::class, 'kehadiran_aksi'])->name('kehadiran.action');
Route::post('updateKehadiran', [PenilaianController::class, 'updateKehadiran']);

Route::get('penilaian', [PenilaianController::class, 'penilaian_nilai'])->name('nilai');
Route::get('penilaiansiswa/{id}', [PenilaianController::class, 'penilaian_aksi']);
Route::post('penilaiandaftarsiswa', [PenilaianController::class, 'penilaian_update'])->name('penilaian.action');


Route::get('raport', [PenilaianController::class, 'digitalraport'])->name('digitalraport');
Route::get('hasilraport/{id}', [PenilaianController::class, 'hasilpdf'])->name('hasil');

// Route::get('penilaian/', [PenilaianController::class, 'penilaian_nilai'])->name('nilai');
// Route::get('penilaian/{id}', [PenilaianController::class, 'penilaianmodal'])->name('penilaian');

// Route::post('penilaian', [PenilaianController::class, 'penilaian_aksi'])->name('penilaian.action');



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

