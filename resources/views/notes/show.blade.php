@extends('layouts.app')

@section('title', $note->title)

@section('breadcrumbs')
    <a href="{{ route('notes.index') }}">📋 Mis Notas</a> > 
    <span>{{ Str::limit($note->title, 30) }}</span>
@endsection

@section('page-header')
    <h1 class="page-title" style="display: flex; align-items: center; gap: 10px;">
        {{ $note->title }}
        @if($note->is_favorite)
            <span style="color: #ffc107;">⭐</span>
        @endif
    </h1>
    <p class="page-subtitle">
        @if($note->category)
            🏷️ {{ $note->category }} • 
        @endif
        Creada el {{ $note->created_at->format('d/m/Y H:i') }}
    </p>
@endsection

@section('content')
    <div class="note-show-container">
        <div class="note-show-meta">
            <strong>Palabras:</strong> {{ str_word_count($note->content) }} • 
            <strong>Caracteres:</strong> {{ strlen($note->content) }} • 
            <strong>Creada:</strong> {{ $note->created_at->diffForHumans() }}
        </div>
        
        <div class="note-show-content">
            {{ $note->content }}
        </div>
        
        <div class="note-show-actions">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-success">
                ✏️ Editar
            </a>
            
            <form method="POST" action="{{ route('notes.destroy', $note->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de eliminar esta nota?')">
                    🗑️ Eliminar
                </button>
            </form>
            
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                📋 Ver todas las notas
            </a>
        </div>
    </div>
@endsection