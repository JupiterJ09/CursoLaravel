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
        // Obtener todas las notas ordenadas por fecha (más recientes primero)
        $notes = Note::orderBy('created_at', 'desc')->get();
        
        // Retornar la vista con las notas
        return view('notes.index', compact('notes'));
    }

    /**
     * Mostrar una nota específica
     */
    public function show($id)
    {
        // Buscar la nota por ID o fallar con 404
        $note = Note::findOrFail($id);
        
        // Retornar la vista con la nota
        return view('notes.show', compact('note'));
    }

    /**
     * Mostrar el formulario para crear una nueva nota
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Guardar una nueva nota en la base de datos
     */
    public function store(Request $request)
    {
        // Validar los datos con mensajes personalizados
        $validated = $request->validate([
            'title' => 'required|max:255|min:3',
            'content' => 'required|min:10',
            'category' => 'nullable|string|max:100',
            'is_favorite' => 'boolean',
        ], [
            'title.required' => 'El título es obligatorio',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'title.min' => 'El título debe tener al menos 3 caracteres',
            'content.required' => 'El contenido es obligatorio',
            'content.min' => 'El contenido debe tener al menos 10 caracteres',
            'category.max' => 'La categoría no puede tener más de 100 caracteres',
        ]);

        // Procesar el checkbox de favorito
        $validated['is_favorite'] = $request->has('is_favorite');

        // Crear la nota usando mass assignment
        Note::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('notes.index')
                        ->with('success', '¡Nota creada exitosamente! 🎉');
    }

    /**
     * Mostrar el formulario para editar una nota
     */
    public function edit($id)
    {
        // Buscar la nota o fallar con 404
        $note = Note::findOrFail($id);
        
        return view('notes.edit', compact('note'));
    }

    /**
     * Actualizar una nota existente
     */
    public function update(Request $request, $id)
    {
        // Buscar la nota o fallar con 404
        $note = Note::findOrFail($id);

        // Validar los datos
        $validated = $request->validate([
            'title' => 'required|max:255|min:3',
            'content' => 'required|min:10',
            'category' => 'nullable|string|max:100',
            'is_favorite' => 'boolean',
        ], [
            'title.required' => 'El título es obligatorio',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'title.min' => 'El título debe tener al menos 3 caracteres',
            'content.required' => 'El contenido es obligatorio',
            'content.min' => 'El contenido debe tener al menos 10 caracteres',
            'category.max' => 'La categoría no puede tener más de 100 caracteres',
        ]);

        // Procesar el checkbox de favorito
        $validated['is_favorite'] = $request->has('is_favorite');

        // Actualizar la nota
        $note->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('notes.show', $note->id)
                        ->with('success', '¡Nota actualizada exitosamente! ✏️');
    }

    /**
     * Eliminar una nota
     */
    public function destroy($id)
    {
        // Buscar la nota o fallar con 404
        $note = Note::findOrFail($id);
        
        // Guardar el título para el mensaje
        $title = $note->title;
        
        // Eliminar la nota
        $note->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('notes.index')
                        ->with('success', "Nota '{$title}' eliminada exitosamente! 🗑️");
    }
}