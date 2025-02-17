<?php

use App\Models\Kelas;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

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
//! INI TEST ROUTE JAN DI APA APAIN

Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('/masuk-siswa', function () {
        return view('Test.signin');
    });
    Route::post('/signin-siswa', [SiswaAuth::class, 'signinSiswa'])->name('siswa.signin');

    Route::get('/masuk-admin', function () {
        return view('Test.adminlogin');
    });
    Route::post('/signin-admin', [AdminAuth::class, 'loginAdmin'])->name('admin.signin');

    // ? ini buat tes kelas
    Route::get('/buat-kelas', function () {
        return view('Test.buatkelas',[
            'data' => null,
            'kelas' => Kelas::all()
        ]);
    });
    Route::post('/store-kelas', [KelasController::class, 'storeClass'])->name('class.store');
    Route::get('/delete-kelas/{kelas}', [KelasController::class, 'destroy'])->name('class.delete');
    Route::get('/edit-kelas/{kelas}', [KelasController::class, 'edit'])->name('class.edit');
    Route::post('/update-kelas/{kelas}', [KelasController::class, 'update'])->name('class.update');
});

//! INI TEST ROUTE

Route::get('/sLanding', function () {
    return view('page.Dasboard.sLanding');
});

Route::get('/', function () {
    return view('page.Dasboard.fLanding');
})->name('FLanding');

Route::get('/sLanding/Admin', function () {
    return view('admin.page.Dashboard.Landing');
});

Route::get('/sLanding/Admin/manageSiswa', function () {
    return view('admin.page.Dashboard.manageSiswa');
});

Route::group(['prefix' => 'siswa', 'as' => 'siswa.', 'middleware' => 'AuthCheck'], function () {
    // Dashboard siswa
    Route::get('/dashboardSiswa', [SiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/logoutSiswa', [AuthController::class, 'logoutSiswa'])->name('logoutSiswa');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signin', [AuthController::class, 'signIn'])->name('signin');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'AuthCheck'], function () {
    // Regist
    Route::get('/register-admin', [AdminAuth::class, 'registerAdmin'])->name('register');
    Route::post('/signup-admin', [AdminAuth::class, 'signupAdmin'])->name('signup');
    Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
    // Halaman Atmint
    Route::get('/dashboardAdmin', [AdminController::class, 'dashboard'])->name('dashboard');
    // Navigasi Fitur Atmint
    Route::get('/ManageSiswa', [AdminController::class, 'ManageSiswa'])->name('ManageSiswa');
    Route::get('/ManageKelas', [AdminController::class, 'ManageKelas'])->name('ManageKelas');
    Route::get('/ManagePetugas', [AdminController::class, 'ManagePetugas'])->name('ManagePetugas');
    Route::get('/ManageSPP', [AdminController::class, 'ManageSPP'])->name('ManageSPP');
    Route::get('/BayarSPP', [AdminController::class, 'BayarSPP'])->name('BayarSPP');
});
