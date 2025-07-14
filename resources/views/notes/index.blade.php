@extends('layouts.app')

@section('title', 'Mis Notas')

@section('breadcrumbs')
    <span>📋 Mis Notas</span>
@endsection

@section('page-header')
    <h1 class="page-title">Mis Notas</h1>
    <p class="page-subtitle">Organiza tus ideas y pensamientos</p>
@endsection

@section('content')
    @if($notes->count() > 0)
        <div class="notes-grid">
            @foreach($notes as $note)
                <div class="note-card">
                    <div class="note-title">
                        {{ $note->title }}
                        @if($note->is_favorite)
                            <span class="favorite-icon">⭐</span>
                        @endif
                    </div>
                    
                    @if($note->category)
                        <div class="note-category">
                            🏷️ {{ $note->category }}
                        </div>
                    @endif
                    
                    <div class="note-content">
                        {{ Str::limit($note->content, 150) }}
                    </div>
                    
                    <div class="note-meta">
                        <div class="note-date">
                            {{ $note->created_at->format('d/m/Y H:i') }}
                        </div>
                        
                        <div class="note-actions">
                            <a href="{{ route('notes.show', $note->id) }}" class="btn-sm btn-view">
                                👁️ Ver
                            </a>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn-sm btn-edit">
                                ✏️ Editar
                            </a>
                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-delete" 
                                        onclick="return confirm('¿Estás seguro de eliminar esta nota?')">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-notes">
            <div class="no-notes-icon">📝</div>
            <h2>No tienes notas todavía</h2>
            <p>¡Crea tu primera nota para empezar!</p>
            <a href="{{ route('notes.create') }}" class="btn btn-primary">
                Crear Primera Nota
            </a>
        </div>
    @endif
@endsection