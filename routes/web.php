<?php

use App\Http\Controllers\KursusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('beranda');
});
// Route::get('/kursus', function () {
//     return view('kursus');
// });

Route::get('/kursus', [KursusController::class, 'kursus'])->name('kursus');

// Route::get('/settingkursus', 'KursusController@data');
// Route::get('/settingkursus', function () {
//     return view('kursus.data');
// });
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/settingkursus', [KursusController::class, 'data'])->name('data');
    Route::get('/tambahkursus', [KursusController::class, 'tambah'])->name('tambah');
    Route::get('/ubahkursus/{id}', [KursusController::class, 'ubah'])->name('ubah');
    Route::post('/tambahkursusProcess', [KursusController::class, 'tambahProcess'])->name('tambahProcess');
    // Route::patch('baru/{id}', 'BaruController@editProcess');
    // Route::delete('baru/{id}', 'BaruController@delete');
    // Route::get('/settingkursus', 'KursusController@index');
    // Route::get('/tambahkursus', function () {
    //     return view('kursus.tambah');
    // });
});

Route::group(['middleware' => ['auth', 'role:user']], function() {
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
