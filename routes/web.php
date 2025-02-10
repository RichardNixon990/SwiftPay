<?php

use App\Models\Kelas;
use App\Http\Controllers\AdminAuth;
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

Route::get('/', function () {
    return view('admin.admin_page.Login_Register.register');
});

Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
    Route::post('/signin-siswa', [SiswaAuth::class, 'signinSiswa'])->name('signin');
});
