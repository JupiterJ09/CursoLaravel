<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Mostrar todas las notas
     */
    public function index()
    {
        // Obtener todas las notas de la base de datos
        $notes = Note::all();
        
        // Retornar la vista con las notas
        return view('index', compact('notes'));
    }
    
    /**
     * Mostrar una nota específica
     */
    public function show($id)
    {
        // Buscar la nota por ID
        $note = Note::find($id);
        
        // Si no existe, redirigir con error
        if (!$note) {
            return redirect()->route('index')
                ->with('error', 'Nota no encontrada');
        }
        
        // Retornar la vista con la nota
        return view('show', compact('note'));
    }
}