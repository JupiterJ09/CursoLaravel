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


// Rutas para notas usando el controlador
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/{id}', [NoteController::class, 'show'])->name('notes.show');


