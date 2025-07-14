@extends('layouts.app')

@section('title', 'Crear Nueva Nota')

@section('breadcrumbs')
    <a href="{{ route('notes.index') }}">📋 Mis Notas</a> > 
    <span>✏️ Nueva Nota</span>
@endsection

@section('page-header')
    <h1 class="page-title">✏️ Crear Nueva Nota</h1>
    <p class="page-subtitle">Escribe tus ideas, pensamientos o recordatorios</p>
@endsection

@section('content')
    <div class="form-container">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Título *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       placeholder="Escribe un título descriptivo...">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="category">Categoría:</label>
                <select id="category" name="category">
                    <option value="">Selecciona una categoría</option>
                    <option value="Personal" {{ old('category') == 'Personal' ? 'selected' : '' }}>📝 Personal</option>
                    <option value="Trabajo" {{ old('category') == 'Trabajo' ? 'selected' : '' }}>💼 Trabajo</option>
                    <option value="Estudio" {{ old('category') == 'Estudio' ? 'selected' : '' }}>📚 Estudio</option>
                    <option value="Ideas" {{ old('category') == 'Ideas' ? 'selected' : '' }}>💡 Ideas</option>
                    <option value="Recordatorios" {{ old('category') == 'Recordatorios' ? 'selected' : '' }}>⏰ Recordatorios</option>
                    <option value="Otros" {{ old('category') == 'Otros' ? 'selected' : '' }}>📋 Otros</option>
                </select>
                @error('category')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">Contenido *</label>
                <textarea id="content" name="content" 
                          placeholder="Escribe el contenido de tu nota aquí...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_favorite" name="is_favorite" value="1" 
                           {{ old('is_favorite') ? 'checked' : '' }}>
                    <label for="is_favorite">⭐ Marcar como favorita</label>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    💾 Guardar Nota
                </button>
                <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                    ❌ Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection