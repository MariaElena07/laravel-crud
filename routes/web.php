<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Models\User;
Use App\Http\Controllers\InscripcionController;


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
    return view('auth/login');
})->name('auth/login');
 
//Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');

     Route::post('cursos', 'save')->name('course.save');
     Route::delete('cursos', 'destroy/{id}')->name('destroy');
     
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [UserController::class, 'home'])->name('home');
    // Route::get('/inscripcion', [InscripcionController::class, 'index'])->name('inscripcion');
    // Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripcion');


    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
    Route::post('/actualizar_Profile', [UserController::class, 'ActualizarProfile'])->name('actualizar_Profile');
});
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
 
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
    Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('update_profile');


    Route::get('/admin/notas', [NotaController::class, 'alumnos'])->name('admin/notas');
    Route::post('/admin/notas/save', [NotaController::class, 'save'])->name('admin/notas/save');
    Route::delete('/admin/notas/destroy/{id}', [NotaController::class, 'destroy'])->name('admin/notas/destroy');
    Route::post('/admin/notas/update/{id}', [NotaController::class, 'update'])->name('admin/notas/update');



    Route::get('/admin/cursos', [CourseController::class, 'index'])->name('admin/cursos');
    Route::post('/admin/course/save', [CourseController::class, 'save'])->name('admin/course/save');
    Route::delete('/admin/course/destroy/{id}', [CourseController::class, 'destroy'])->name('admin/course/destroy');
    Route::get('/admin/course/edit/{id}', [CourseController::class, 'edit'])->name('admin/course/edit');
    Route::post('/admin/course/update/{id}', [CourseController::class, 'update'])->name('admin/course/update');


});
