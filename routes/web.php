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
use App\Http\Controllers\backend\Setup\ExamTypeController;
use App\Http\Controllers\backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\AssignSubjectController;

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
    Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('fee.amount.update');
    Route::get('fee/amount/details/{id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');

    // Exam type
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');

    // School Subject
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'AddSchoolSubject'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('school.subject.store');
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'EditSchoolSubject'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('school.subject.update');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'DeleteSchoolSubject'])->name('school.subject.delete');

    // Assign Subject
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('assign.subject.update');
    Route::get('assign/subject/details/{id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');

    // Designation
    Route::get('designation/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('designation.view');
    Route::get('designation/add', [SchoolSubjectController::class, 'AddSchoolSubject'])->name('designation.add');
    Route::post('designation/store', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('designation.store');
    Route::get('designation/edit/{id}', [SchoolSubjectController::class, 'EditSchoolSubject'])->name('designation.edit');
    Route::post('designation/update/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('designation.update');
    Route::get('designation/delete/{id}', [SchoolSubjectController::class, 'DeleteSchoolSubject'])->name('designation.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');









