<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $note->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .note-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .note-title {
            font-size: 2.5em;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .favorite-icon {
            color: #ffc107;
        }
        .note-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            color: #666;
        }
        .note-category {
            background-color: #e9ecef;
            color: #495057;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.9em;
        }
        .note-content {
            font-size: 1.1em;
            line-height: 1.8;
            color: #333;
            margin-bottom: 30px;
            white-space: pre-wrap;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn:hover { opacity: 0.8; }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #28a745;
            text-decoration: none;
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
    </style>
</head>
<body>
    <a href="{{ route('notes.index') }}" class="back-link">← Volver a mis notas</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="container">
        <div class="note-header">
            <h1 class="note-title">
                {{ $note->title }}
                @if($note->is_favorite)
                    <span class="favorite-icon">⭐</span>
                @endif
            </h1>
            
            <div class="note-meta">
                <div>
                    @if($note->category)
                        <span class="note-category">🏷️ {{ $note->category }}</span>
                    @endif
                </div>
                <div>
                    Creada el {{ $note->created_at->format('d/m/Y H:i') }}
                    @if($note->updated_at != $note->created_at)
                        <br><small>Editada el {{ $note->updated_at->format('d/m/Y H:i') }}</small>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="note-content">
            {{ $note->content }}
        </div>
        
        <div class="actions">
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
</body>
</html>