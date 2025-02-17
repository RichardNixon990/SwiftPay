<?php

use App\Models\Kelas;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

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
});

Route::get('/sLanding/Admin', function () {
    return view('admin.page.Dashboard.Landing');
});

Route::get('/sLanding/Admin/manageSiswa', function () {
    return view('admin.page.Dashboard.manageSiswa');
});

Route::get('/sLanding/Admin/manageClass', function () {
    return view('admin.page.Dashboard.manageClass');
});

Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
    Route::get('/signin-siswa', [SiswaAuth::class, 'loginSiswa'])->name('login');
    Route::post('/signin-siswa', [SiswaAuth::class, 'signinSiswa'])->name('signin');
});

Route::post('/signin', [AuthController::class, 'signIn'])->name('signin');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/signin-admin', [AdminAuth::class, 'signinAdmin'])->name('signin');
    Route::post('/login-admin', [AdminAuth::class, 'loginAdmin'])->name('login');
    // Regist
    Route::get('/register-admin', [AdminAuth::class, 'registerAdmin'])->name('register');
    Route::post('/signup-admin', [AdminAuth::class, 'signupAdmin'])->name('signup');
});
