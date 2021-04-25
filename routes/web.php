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

/************** Student Role **************/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registration', function () {
    return view('regisStd');
});

Route::get('/withdraw', function() {
    return view('wdStd');
});

Route::get('/gpax', function() {
    return view('gradeStd');
});

Route::get('/pay', function() {
    return view('payStd');
});

/************** Professor (Teacher) Role **************/
Route::prefix('tch')->group(function ()
{
    Route::get('/login', [App\Http\Controllers\Auth\TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('/login', [App\Http\Controllers\Auth\TeacherLoginController::class, 'login'])->name('teacher.login.submit');
    Route::get('/home', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.home');
});
