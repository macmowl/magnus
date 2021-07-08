<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;

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
    return view('auth.login');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// User Management routes
Route::prefix('users')->group(function() {
    Route::get('/', [UserController::class, 'showAll'])->name('user.view');
    Route::get('/new', [UserController::class, 'addUser'])->name('user.new');
    Route::post('/store', [UserController::class, 'storeUser'])->name('user.store');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
