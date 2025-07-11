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
        .note-container {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .note-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }
        .note-content {
            color: #666;
            line-height: 1.6;
            font-size: 1.1em;
        }
        .note-meta {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #999;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="{{ route('index') }}" class="back-button">← Volver a las notas</a>
    
    <div class="note-container">
        <h1 class="note-title">{{ $note->title }}</h1>
        <div class="note-content">{{ nl2br(e($note->content)) }}</div>
        <div class="note-meta">
        <p>Creada el: {{ $note->created_at ? $note->created_at->format('d/m/Y H:i') : 'Sin fecha' }}</p>
        <p>Última actualización: {{ $note->updated_at ? $note->updated_at->format('d/m/Y H:i') : 'Sin fecha' }}</p>
        </div>
    </div>
</body>
</html>