<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ["title" => "Home"]);
});

Route::get('/dashboard/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Fatih Abdurrahman",
        "kelas" => "11 PPLG 2",
        "foto" => asset("img/saya.jpg")
    ]);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login/index', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login/index', [LoginController::class, 'login']);

Route::get('/register/index', [RegisterController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'store'])->name('Register.store');

Route::get('/students/all', [StudentsController::class, 'index']);
Route::get('/student/detail/{student}', [StudentsController::class, 'show']);

Route::get('/student/add', [StudentsController::class, 'create']);
Route::post('/student/store', [StudentsController::class, 'store']);

Route::get('/student/edit/{student}', [StudentsController::class, 'edit']);
Route::patch('/student/update/{student}', [StudentsController::class, 'update']);

Route::delete('/student/delete/{id}', [StudentsController::class, 'destroy']);

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::delete('/kelas/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');

Route::get('/dashboard/student', [AdminController::class, 'index']);
Route::get('/dashboard/kelas', [AdminController::class, 'kelas']);
Route::get('/dashboard/index', [AdminController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::get('/dashboard/student', [AdminController::class, 'student'])->name('dashboard.student')->middleware('auth');
Route::get('/dashboard/detail/{student}', [AdminController::class, 'showdashboard'])->name('dashboard.detail')->middleware('auth');
Route::get('/dashboard/addsiswa', [StudentsController::class, 'create'])->name('student.create')->middleware('auth');
Route::get('/dashboard/editsiswa/{student}', [StudentsController::class, 'edit'])->name('student.edit')->middleware('auth');
Route::delete('/dashboard/kelas/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy')->middleware('auth');
Route::get('/dashboard/addkelas', [KelasController::class, 'create'])->name('kelas.create')->middleware('auth');

Route::group(['middleware' => "Checklogin", "prefix" => "/dashboard"], function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/student', [AdminController::class, 'student']);
    Route::get('/kelas', [AdminController::class, 'kelas']);
});
