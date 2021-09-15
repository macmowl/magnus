<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\Setup\SubjectController;
use App\Http\Controllers\backend\Setup\ShiftController;
use App\Http\Controllers\backend\Setup\FeeCategoryController;
use App\Http\Controllers\backend\Setup\FeeAmountController;

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
    Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::post('/edit/{id}', [UserController::class, 'updateUser'])->name('user.edit');
    Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
});

// User profile
Route::prefix('profile')->group(function() {
    Route::get('/', [ProfileController::class, 'showProfile'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password-update', [ProfileController::class, 'updatePassword'])->name('password.update');
});

// Student Route
Route::prefix('setup')->group(function() {

    // Student Class
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'AddStudentClass'])->name('student.class.add');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'EditStudentClass'])->name('student.class.edit');
    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

    // Student Year
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
    Route::post('student/year/store', [StudentYearController::class, 'YearStore'])->name('store.student.year');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'EditStudentYear'])->name('student.year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

    // Subject
    Route::get('subject/view', [SubjectController::class, 'ViewSubject'])->name('subject.view');
    Route::get('subject/add', [SubjectController::class, 'AddSubject'])->name('subject.add');
    Route::post('subject/store', [SubjectController::class, 'StoreSubject'])->name('subject.store');
    Route::get('subject/edit/{id}', [SubjectController::class, 'EditSubject'])->name('subject.edit');
    Route::post('subject/update/{id}', [SubjectController::class, 'UpdateSubject'])->name('subject.update');
    Route::get('subject/delete/{id}', [SubjectController::class, 'DeleteSubject'])->name('subject.delete');

    // Shift
    Route::get('shift/view', [ShiftController::class, 'ViewShift'])->name('shift.view');
    Route::get('shift/add', [ShiftController::class, 'AddShift'])->name('shift.add');
    Route::post('shift/store', [ShiftController::class, 'StoreShift'])->name('shift.store');
    Route::get('shift/edit/{id}', [ShiftController::class, 'EditShift'])->name('shift.edit');
    Route::post('shift/update/{id}', [ShiftController::class, 'UpdateShift'])->name('shift.update');
    Route::get('shift/delete/{id}', [ShiftController::class, 'DeleteShift'])->name('shift.delete');

    // Fee Category
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'AddFeeCategory'])->name('fee.category.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'EditFeeCategory'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFeeCategory'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('fee.category.delete');

    // Fee Category
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');









