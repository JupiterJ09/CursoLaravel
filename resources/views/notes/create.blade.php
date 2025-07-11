<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Nota</title>
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
            transform: scale(1.2);
        }
        .checkbox-group label {
            margin-bottom: 0;
            font-weight: normal;
            cursor: pointer;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .button-group {
            text-align: center;
            margin-top: 30px;
        }
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-row .form-group {
            flex: 1;
        }
        .category-select {
            background-color: #fff;
        }
        .favorite-section {
            background-color: #fff3cd;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ffeaa7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 Crear Nueva Nota</h1>
        
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       placeholder="Escribe el título de tu nota...">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="category">Categoría:</label>
                    <select id="category" name="category" class="category-select">
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

                <div class="form-group">
                    <label>&nbsp;</label>
                    <div class="favorite-section">
                        <div class="checkbox-group">
                            <input type="checkbox" 
                                   id="is_favorite" 
                                   name="is_favorite" 
                                   value="1"
                                   {{ old('is_favorite') ? 'checked' : '' }}>
                            <label for="is_favorite">⭐ Marcar como favorito</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="content">Contenido:</label>
                <textarea id="content" 
                          name="content" 
                          placeholder="Escribe el contenido de tu nota...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit">💾 Guardar Nota</button>
                <a href="{{ route('notes.index') }}">
                    <button type="button" class="btn-secondary">🔙 Volver</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>