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
        return view('notes.index', compact('notes'));
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
            return redirect()->route('notes.index')
                ->with('error', 'Nota no encontrada');
        }
        
        // Retornar la vista con la nota
        return view('notes.show', compact('note'));
    }



    // Nuevo método para mostrar el formulario
    public function create()
    {
        return view('notes.create');
    }
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'nullable|string|max:100',
            'is_favorite' => 'boolean',
        ]);
    
        // Crear la nota
        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'is_favorite' => $request->has('is_favorite') ? true : false,
        ]);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('notes.index')
                        ->with('success', 'Nota creada exitosamente!');
    }
}