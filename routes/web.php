<?php

use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\SiswaAuth;
use Illuminate\Support\Facades\Route;

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
//! INI TEST ROUTE
Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('/masuk-siswa', function () {
        return view('Test.signin');
    });
    Route::post('/signin-siswa', [SiswaAuth::class, 'signinSiswa'])->name('siswa.signin');

    Route::get('/masuk-admin', function () {
        return view('Test.adminlogin');
    });
    Route::post('/signin-admin', [AdminAuth::class, 'loginAdmin'])->name('admin.signin');


});

//! INI TEST ROUTE

Route::get('/', function () {
    return view('welcome');
});
