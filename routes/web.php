<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RoleController;
use Illuminate\Routing\RouteGroup;

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
//     return view('index');
// })->middleware('auth');
// Route::get('buku/create', function () {
//     return view('buku.create');
// })->middleware('role:admin', 'auth');

// Route::get('/buku', [BukuController::class, 'index'])->middleware('role:user');

// Route::resource('/buku', BukuController::class);
// Route::resource('/peminjaman', PeminjamanController::class);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/regis', function () {
    return view('auth.daftar');
})->name('daftar');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/daftar', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
    return view('index');
});
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/user', function () {
        return view('user.index');
    });

    Route::get('/dashboard', function (){
        return view('dashboard');
    });

    // Route::get('/dashborad', [DashboardController::class, 'peminjaman', 'buku', 'user']);

    Route::middleware(['role:admin'])->group(function (){
        Route::prefix('admin')->group(function (){
            Route::resource('/buku', BukuController::class);
            Route::resource('/peminjaman', PeminjamanController::class);
            Route::resource('/role', RoleController::class);
        });
    });
    Route::middleware(['role:user'])->group(function (){
        Route::prefix('user')->group(function (){
     
            // Route::get('/buku/{buku}', [BukuController::class, 'show']);
           
            // Route::get('/peminjaman/{peminjaman}', [BukuController::class, 'show']);
            // Route::resource('/buku', BukuController::class);
            // Route::resource('/peminjaman', PeminjamanController::class);
        });
    });
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/{buku}', [BukuController::class, 'show']);
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/peminjaman/{peminjaman}', [PeminjamanController::class, 'show']);
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/role/{role}', [RoleController::class, 'show']);

});