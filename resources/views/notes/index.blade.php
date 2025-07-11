<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Notas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .notes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .note-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .note-card:hover {
            transform: translateY(-5px);
        }
        .note-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .note-content {
            color: #666;
            line-height: 1.5;
        }
        .note-date {
            color: #999;
            font-size: 0.9em;
            margin-top: 10px;
        }
        .no-notes {
            text-align: center;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>📝 Mis Notas</h1>

    @if(session('error'))
        <div class="alert alert-error">
            ❌ {{ session('error') }}
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif
    
    @if($notes->count() > 0)
        <div class="notes-grid">
            @foreach($notes as $note)
        <a href="{{ route('notes.show', $note->id) }}" style="text-decoration: none; color: inherit;">
                <div class="note-card">
                    <div class="note-title">{{ $note->title }}</div>
                    <div class="note-content">{{ Str::limit($note->content, 100) }}</div>
                    <div class="note-date">
                    {{ $note->created_at ? $note->created_at->format('d/m/Y H:i') : 'Sin fecha' }}
                    </div>
                </div>
            @endforeach
        </a>
        </div>
    @else
        <div class="no-notes">
            <p>No tienes notas todavía. ¡Crea tu primera nota!</p>
        </div>
    @endif
</body>
</html>