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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\LoginController::class)
    ->prefix('login')
    ->group(function() {
        Route::get('/', 'login')->name('form-login');
        Route::post('/', 'postLogin')->name('post-login');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::prefix('admin')
    ->middleware(['auth', 'can:admin'])
    ->as('admin.')
    ->group(function () {
        Route::controller(\App\Http\Controllers\Admin\KelasController::class)
            ->prefix('kelas')
            ->as('kelas.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'delete')->name('delete');
            });
        Route::controller(\App\Http\Controllers\Admin\PelajaranController::class)
            ->prefix('pelajaran')
            ->as('pelajaran.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'delete')->name('delete');
            });

        // Siswa
        Route::controller(\App\Http\Controllers\Admin\SiswaController::class)
            ->prefix('siswa')
            ->as('siswa.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'delete')->name('delete');
            });

        // Guru
        Route::controller(\App\Http\Controllers\Admin\GuruController::class)
            ->prefix('guru')
            ->as('guru.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'delete')->name('delete');
            });

        // Guru
        Route::controller(\App\Http\Controllers\Admin\PembelajaranController::class)
            ->prefix('pembelajaran')
            ->as('pembelajaran.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'delete')->name('delete');
            });
    });

Route::prefix('guru')
    ->middleware(['auth', 'can:guru'])
    ->as('guru.')
    ->group(function () {
        Route::controller(\App\Http\Controllers\Guru\PembelajaranController::class)
            ->prefix('pembelajaran')
            ->as('pembelajaran.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}', 'detail')->name('detail');
            });

        Route::controller(\App\Http\Controllers\Guru\MateriController::class)
            ->prefix('materi')
            ->as('materi.')
            ->group(function () {
                Route::get('/create/{pembelajaranId}', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}', 'detail')->name('detail');
            });
    });

Route::prefix('siswa')
    ->middleware(['auth', 'can:siswa'])
    ->as('siswa.')
    ->group(function () {
        Route::controller(\App\Http\Controllers\Siswa\PembelajaranController::class)
            ->prefix('pembelajaran')
            ->as('pembelajaran.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}/', 'detail')->name('detail');
            });
    });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
