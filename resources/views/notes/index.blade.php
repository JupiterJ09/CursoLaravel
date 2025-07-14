<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Notas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #333;
            margin: 0;
        }
        .btn-create {
            background-color: #28a745;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-create:hover {
            background-color: #218838;
        }
        .notes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .note-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s;
            position: relative;
        }
        .note-card:hover {
            transform: translateY(-5px);
        }
        .note-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .favorite-icon {
            color: #ffc107;
            font-size: 0.9em;
        }
        .note-category {
            background-color: #e9ecef;
            color: #495057;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            display: inline-block;
            margin-bottom: 10px;
        }
        .note-content {
            color: #666;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        .note-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .note-date {
            color: #999;
            font-size: 0.9em;
        }
        .note-actions {
            display: flex;
            gap: 8px;
        }
        .btn-sm {
            padding: 4px 8px;
            font-size: 0.8em;
            text-decoration: none;
            border-radius: 3px;
            border: none;
            cursor: pointer;
        }
        .btn-view { background-color: #007bff; color: white; }
        .btn-edit { background-color: #28a745; color: white; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-sm:hover { opacity: 0.8; }
        .no-notes {
            text-align: center;
            color: #666;
            padding: 60px 20px;
        }
        .no-notes-icon {
            font-size: 4em;
            margin-bottom: 20px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="header">
        <h1>📒 Mis Notas</h1>
        <a href="{{ route('notes.create') }}" class="btn-create">
            ➕ Nueva Nota
        </a>
    </div>

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
            <a href="{{ route('notes.create') }}" class="btn-create" style="margin-top: 20px;">
                Crear Primera Nota
            </a>
        </div>
    @endif
</body>
</html>