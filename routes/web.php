<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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
    return view('home',["title" => "Home"]);
});

Route::get('/about', function () {
    return view('about',["title" => "About",
    "nama" => "Fatih Abdurrahman",
    "kelas" => "11 PPLG 2",
    "foto" => asset("img/saya.jpg")]);
});

Route::get('/login/index', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/index', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/students/all', [StudentsController::class, 'index']);
Route::get('/student/detail/{student}', [StudentsController::class, 'show']);

Route::get('/student/add', [StudentsController::class, 'create']);
Route::post('/student/store', [StudentsController::class, 'store']);

Route::get('/student/edit/{student}', [StudentsController::class, 'edit']);
Route::patch('/student/update/{student}', [StudentsController::class, 'update']);

Route::delete('/student/delete/{id}', [StudentsController::class, 'destroy']);

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');