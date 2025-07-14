<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar: {{ $note->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .header p {
            color: #666;
            margin: 0;
            font-style: italic;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #28a745;
        }
        textarea {
            resize: vertical;
            min-height: 120px;
            font-family: Arial, sans-serif;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .checkbox-group input[type="checkbox"] {
            width: auto;
        }
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .form-group.has-error input,
        .form-group.has-error textarea,
        .form-group.has-error select {
            border-color: #dc3545;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
            flex: 1;
        }
        .btn-primary {
            background-color: #28a745;
            color: white;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #28a745;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .current-info {
            background-color: #f8f9fa;
            border-left: 4px solid #28a745;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 0 5px 5px 0;
        }
        .current-info p {
            margin: 0;
            color: #495057;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <a href="{{ route('notes.show', $note->id) }}" class="back-link">← Volver a la nota</a>
    
    <div class="container">
        <div class="header">
            <h1>✏️ Editar Nota</h1>
            <p>Modificando: "{{ Str::limit($note->title, 50) }}"</p>
        </div>

        <div class="current-info">
            <p><strong>Creada:</strong> {{ $note->created_at->format('d/m/Y H:i') }}</p>
            @if($note->updated_at != $note->created_at)
                <p><strong>Última edición:</strong> {{ $note->updated_at->format('d/m/Y H:i') }}</p>
            @endif
        </div>

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
                <select id="category" name="category" class="category-select">
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
</body>
</html>