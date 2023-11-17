<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormInfor;
use App\Http\Controllers\UserDataController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/formulario-informacion', [FormInfor::class, 'index'])->name('formularioInformacion');


});
Route::get('/', [UserDataController::class, 'index']);
// CREAR USUARIOS Ruta para procesar el formulario y almacenar el usuario
Route::post('/userData', [FormInfor::class, 'store'])->name('userData.store');
    
// Delete
Route::delete('/', [UserDataController::class, 'destroy'])->name('eliminar');


require __DIR__.'/auth.php';
