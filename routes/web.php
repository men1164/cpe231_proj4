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

/************** Main Menu **************/
Route::get('/', function () {
    return view('welcome');
});

/************** For student registration dynamic dropdown **************/
Route::get('/register/getDepartment', [App\Http\Controllers\Auth\RegisterController::class, 'getDepartment'])->name('getDepartment');
Route::get('/register/getProgram', [App\Http\Controllers\Auth\RegisterController::class, 'getProgram'])->name('getProgram');

/** Routes for authentication for student role **/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registration', [App\Http\Controllers\HomeController::class, 'showCurrentRegis'])->name('registration');
Route::post('/registration', [App\Http\Controllers\HomeController::class, 'searchClass'])->name('searchClass');
Route::post('/registration/registered', [App\Http\Controllers\HomeController::class, 'registerClass'])->name('registered');

Route::get('/withdraw', [App\Http\Controllers\HomeController::class, 'showCurrentRegisWD'])->name('withdraw');
Route::post('/withdraw', [App\Http\Controllers\HomeController::class, 'withdraw'])->name('withdrawed');

Route::get('/gpax', [App\Http\Controllers\HomeController::class, 'viewGradeIndex'])->name('viewGrade');

Route::get('/pay', [App\Http\Controllers\HomeController::class, 'paymentIndex'])->name('paymentIndex');
Route::post('/pay', [App\Http\Controllers\HomeController::class, 'paidUpdate'])->name('paid');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profileDetail']);
Route::post('/profile', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('std.updateProfile');

/************** Professor (Teacher) Role **************/
Route::prefix('tch')->group(function ()
{
    Route::get('/login', [App\Http\Controllers\Auth\TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('/login', [App\Http\Controllers\Auth\TeacherLoginController::class, 'login'])->name('teacher.login.submit');
    Route::get('/home', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.home');

    Route::get('/class/home', [App\Http\Controllers\TeacherController::class, 'responseClassIndex'])->name('teacher.classIndex');
    Route::post('/class/stdlists', [App\Http\Controllers\TeacherController::class, 'seeStdLists'])->name('teacher.seeStdLists');

    Route::get('/advisor', [App\Http\Controllers\TeacherController::class, 'showAdviseList'])->name('teacher.advise');
    
    Route::post('/advisor', [App\Http\Controllers\TeacherController::class, 'showStdList'])->name('showStd');
    Route::post('/advisor/added', [App\Http\Controllers\TeacherController::class, 'addStudent'])->name('addStd');
    Route::post('/advisor/removed', [App\Http\Controllers\TeacherController::class, 'removeStudent'])->name('removeStd');

    Route::get('/grader/home', [App\Http\Controllers\TeacherController::class, 'graderIndex'])->name('teacher.gradeIndex');
    Route::post('/grader/home', [App\Http\Controllers\TeacherController::class, 'stdListsGrader'])->name('teacher.stdListsGrader');
    Route::get('/grader/home/selectSec', [App\Http\Controllers\TeacherController::class, 'getSectionNo'])->name('getSectionTch');
    Route::post('/grader/gradeStd', [App\Http\Controllers\TeacherController::class, 'gradeStd'])->name('teacher.gradeStd');
    Route::post('/grader/gradeStd/graded', [App\Http\Controllers\TeacherController::class, 'grading'])->name('teacher.grading');

    Route::get('/register', [App\Http\Controllers\Auth\TeacherRegisterController::class, 'showRegisterForm'])->name('teacher.register');
    Route::post('/register', [App\Http\Controllers\Auth\TeacherRegisterController::class, 'register'])->name('teacher.register.submit');
    Route::get('/register/getDepartment', [App\Http\Controllers\Auth\TeacherRegisterController::class, 'getDepartment'])->name('getDepartmentTch');

    Route::get('/profile', [App\Http\Controllers\TeacherController::class, 'profileDetail'])->name('tch.profile');
    Route::post('/profile', [App\Http\Controllers\TeacherController::class, 'profileUpdate'])->name('tch.updateProfile');
});


/************** Admin Role **************/
Route::prefix('admin')->group(function ()
{
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');

    Route::get('/registermanager', [App\Http\Controllers\AdminController::class, 'regisIndex'])->name('admin.regisManage');
    Route::post('/registermanager', [App\Http\Controllers\AdminController::class, 'searchStd'])->name('admin.searchStd');
    Route::post('/registermanager/removed', [App\Http\Controllers\AdminController::class, 'removedRegis'])->name('admin.removeRegis');

    Route::get('/advisor', [App\Http\Controllers\AdminController::class, 'adviseManager'])->name('admin.advise');
    Route::post('/advisor/removed', [App\Http\Controllers\AdminController::class, 'adviseDelete'])->name('admin.removeAdvise');
    Route::post('/advisor/added', [App\Http\Controllers\AdminController::class, 'adviseAdd'])->name('admin.addAdvise');

    Route::get('/coursetch', [App\Http\Controllers\AdminController::class, 'coursetchIndex'])->name('admin.TinC');
    Route::post('/coursetch', [App\Http\Controllers\AdminController::class, 'searchTch'])->name('admin.searchTch');
    Route::post('/coursetch/added', [App\Http\Controllers\AdminController::class, 'addToClass'])->name('admin.addToClass');
    Route::post('/coursetch/removed', [App\Http\Controllers\AdminController::class,'removeFromClass'])->name('admin.removeFromClass');

    Route::get('/ClassAnalysis', [App\Http\Controllers\AdminController::class, 'classAnalysisIndex'])->name('admin.classAnalysis');
    Route::post('/ClassAnalysis', [App\Http\Controllers\AdminController::class, 'showClassAnalysis'])->name('admin.showClassAnalysis');

    Route::get('/StdAnalysis', [App\Http\Controllers\AdminController::class, 'stdAnalysisIndex'])->name('admin.stdAnalysis');
    Route::post('/StdAnalysis', [App\Http\Controllers\AdminController::class, 'showStdAnalysis'])->name('admin.showStdAnalysis');

    Route::get('/newclass', [App\Http\Controllers\AdminController::class, 'newClassIndex'])->name('admin.newClassIndex');
    Route::post('/newclass', [App\Http\Controllers\AdminController::class, 'insertClass'])->name('admin.insertClass');

    Route::get('/teacherAnalysis', [App\Http\Controllers\AdminController::class, 'tchAnaIndex'])->name('admin.tchAnaIndex');

    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profileDetail'])->name('admin.profile');
    Route::post('/profile', [App\Http\Controllers\AdminController::class, 'profileUpdate'])->name('admin.updateProfile');
});