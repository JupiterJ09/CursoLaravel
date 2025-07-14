@extends('layouts.app')

@section('title', 'Editar: ' . $note->title)

@section('breadcrumbs')
    <a href="{{ route('notes.index') }}">📋 Mis Notas</a> > 
    <a href="{{ route('notes.show', $note->id) }}">{{ Str::limit($note->title, 25) }}</a> > 
    <span>✏️ Editar</span>
@endsection

@section('page-header')
    <h1 class="page-title">✏️ Editar Nota</h1>
    <p class="page-subtitle">
        Modificando: "{{ Str::limit($note->title, 50) }}"
    </p>
@endsection

@section('content')
    <div class="form-container">
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Título *</label>
                <input type="text" id="title" name="title" 
                       value="{{ old('title', $note->title) }}"
                       placeholder="Escribe un título descriptivo...">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="category">Categoría:</label>
                <select id="category" name="category">
                    <option value="">Selecciona una categoría</option>
                    <option value="Personal" {{ old('category', $note->category) == 'Personal' ? 'selected' : '' }}>📝 Personal</option>
                    <option value="Trabajo" {{ old('category', $note->category) == 'Trabajo' ? 'selected' : '' }}>💼 Trabajo</option>
                    <option value="Estudio" {{ old('category', $note->category) == 'Estudio' ? 'selected' : '' }}>📚 Estudio</option>
                    <option value="Ideas" {{ old('category', $note->category) == 'Ideas' ? 'selected' : '' }}>💡 Ideas</option>
                    <option value="Recordatorios" {{ old('category', $note->category) == 'Recordatorios' ? 'selected' : '' }}>⏰ Recordatorios</option>
                    <option value="Otros" {{ old('category', $note->category) == 'Otros' ? 'selected' : '' }}>📋 Otros</option>
                </select>
                @error('category')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">Contenido *</label>
                <textarea id="content" name="content" 
                          placeholder="Escribe el contenido de tu nota aquí...">{{ old('content', $note->content) }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_favorite" name="is_favorite" value="1" 
                           {{ old('is_favorite', $note->is_favorite) ? 'checked' : '' }}>
                    <label for="is_favorite">⭐ Marcar como favorita</label>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    💾 Actualizar Nota
                </button>
                <a href="{{ route('notes.show', $note->id) }}" class="btn btn-secondary">
                    ❌ Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection