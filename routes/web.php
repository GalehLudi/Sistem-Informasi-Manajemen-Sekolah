<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\PelajaranController;

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
  return view('welcome');
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {

  Route::group(['middleware' => ['role:Publik']], function () {
    Route::get('/dashboard', function () {
      return redirect()->to('user/profile');
    })->name('dashboard');
  });

  Route::group(['middleware' => ['role:Super Admin|Admin']], function () {
    Route::get('/dashboard', function () {
      return view('dashboard');
    })->name('dashboard');

    Route::controller(SiswaController::class)->prefix('siswa')->group(function () {
      Route::get('', 'index')->name('siswa');
      Route::get('create', 'create')->name('siswa.create');
      Route::post('create', 'store')->name('siswa.store');
      Route::get('{id}/update', 'edit')->name('siswa.update');
      Route::post('{id}/update', 'update')->name('siswa.save.update');
      Route::get('{id}/delete', 'destroy')->name('siswa.destroy');
    });

    Route::controller(GuruController::class)->prefix('guru')->group(function () {
      Route::get('', 'index')->name('guru');
      Route::get('create', 'create')->name('guru.create');
      Route::post('create', 'store')->name('guru.store');
      Route::get('{id}/update', 'edit')->name('guru.update');
      Route::post('{id}/update', 'update')->name('guru.save.update');
      Route::get('{id}/delete', 'destroy')->name('guru.destroy');
    });

    Route::controller(PelajaranController::class)->prefix('pelajaran')->group(function () {
      Route::get('', 'index')->name('pelajaran');
      Route::post('', 'store')->name('pelajaran.store');
      Route::post('{id}/update', 'update')->name('pelajaran.save.update');
      Route::get('{id}/delete', 'destroy')->name('pelajaran.destroy');
    });

    Route::controller(KurikulumController::class)->prefix('kurikulum')->group(function () {
      Route::get('', 'index')->name('kurikulum');
      Route::post('', 'store')->name('kurikulum.store');
      Route::post('{id}/update', 'update')->name('kurikulum.save.update');
      Route::get('{id}/delete', 'destroy')->name('kurikulum.destroy');
    });

    Route::controller(JadwalController::class)->prefix('jadwal')->group(function () {
      Route::get('', 'index')->name('jadwal');
      Route::post('', 'store')->name('jadwal.store');
      Route::get('{id}/update', 'edit')->name('jadwal.update');
      Route::post('{id}/update', 'update')->name('jadwal.save.update');
      Route::get('{id}/delete', 'destroy')->name('jadwal.destroy');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
      Route::get('', 'index')->name('user');

      Route::middleware(['role:Super Admin'])->group(function () {
        Route::get('{id}/update', 'edit')->name('user.update');
        Route::post('{id}/update', 'update')->name('user.save.update');
        Route::get('{id}/delete', 'destroy')->name('user.destroy');
      });
    });

    Route::controller(PDFController::class)->group(function () {
      Route::get('/pdf/{param}', 'index')->name('pdf');
    });
  });
});
