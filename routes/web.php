<?php

use Illuminate\Support\Facades\Route;
use App\Models\Note;
use App\Http\Controllers\NoteController; 

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
    return view('welcome');
});

// TU NUEVA RUTA
Route::get('/Mypage', function () {
    return view('Mypage');
});

//Ruta Ejemplo sobre mi 

Route::get('/Sobremi', function(){
    $totalNotas = Note::count();
    
    // Pasar el dato a la vista
    return view('Aboutme', compact('totalNotas'));
});

// Ruta principal - redirige a notas
Route::get('/', [NoteController::class, 'index'])->name('notes.index');

// Rutas para notas usando el controlador
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

// Ruta para mostrar el formulario de crear nota
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');

// Ruta para procesar el formulario (guardar la nota)
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

// Ruta para mostrar el formulario de editar (CORREGIDA)
Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');

// Ruta para actualizar una nota (NUEVA)
Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');

// Ruta para mostrar una nota específica
Route::get('/notes/{id}', [NoteController::class, 'show'])->name('notes.show');

// Ruta para eliminar una nota (CORREGIDA)
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');