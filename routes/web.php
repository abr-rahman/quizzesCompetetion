<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolePermissionController;
use App\Models\User;
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

// Route::get('/', function () {
//     return redirect()->route('tasks.index');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('login.create');
});
Route::get('gate', [AuthorizationController::class, 'index'])->name('gate')->middleware('can:isAdmin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'userIndex'])->name('admin.dashboard')->middleware('can:isAdmin');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post("/logout", [LogoutController::class, "store"])->name("logout");
});

Route::get('login', [LoginController::class, 'create'])->name('login.create');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');
