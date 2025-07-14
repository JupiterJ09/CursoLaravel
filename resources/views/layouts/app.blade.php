<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mis Notas')</title>
    <style>
        /* ========== RESET Y BASE ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        /* ========== LAYOUT PRINCIPAL ========== */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8em;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
        
        .nav {
            display: flex;
            gap: 20px;
        }
        
        .nav a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }
        
        .nav a:hover {
            background-color: rgba(255,255,255,0.2);
        }
        
        .nav a.active {
            background-color: rgba(255,255,255,0.3);
        }
        
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            min-height: calc(100vh - 140px);
        }
        
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        /* ========== BREADCRUMBS ========== */
        .breadcrumb {
            background-color: #e9ecef;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 0.9em;
        }
        
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        /* ========== PAGE HEADER ========== */
        .page-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .page-title {
            font-size: 2.5em;
            color: #495057;
            margin-bottom: 10px;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 1.1em;
        }
        
        /* ========== ALERTAS ========== */
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
        
        /* ========== GRID DE NOTAS ========== */
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
        
        /* ========== BOTONES ========== */
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 600;
        }
        
        .btn-sm {
            padding: 4px 8px;
            font-size: 0.8em;
        }
        
        .btn-primary { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; 
        }
        
        .btn-primary:hover { 
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }
        
        .btn-success { 
            background-color: #28a745; 
            color: white; 
        }
        
        .btn-success:hover { 
            background-color: #218838; 
            transform: translateY(-1px);
        }
        
        .btn-danger { 
            background-color: #dc3545; 
            color: white; 
        }
        
        .btn-danger:hover { 
            background-color: #c82333; 
            transform: translateY(-1px);
        }
        
        .btn-secondary { 
            background-color: #6c757d; 
            color: white; 
        }
        
        .btn-secondary:hover { 
            background-color: #545b62; 
            transform: translateY(-1px);
        }
        
        .btn-view { background-color: #007bff; color: white; }
        .btn-edit { background-color: #28a745; color: white; }
        .btn-delete { background-color: #dc3545; color: white; }
        
        /* ========== FORMULARIOS ========== */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            font-family: inherit;
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 5px;
            border: 2px solid #e9ecef;
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
        
        .btn-group .btn {
            flex: 1;
        }
        
        /* ========== VISTA SHOW ========== */
        .note-show-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .note-show-meta {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        
        .note-show-content {
            padding: 30px;
            font-size: 1.1em;
            line-height: 1.8;
            white-space: pre-wrap;
        }
        
        .note-show-actions {
            background: #f8f9fa;
            padding: 20px;
            border-top: 1px solid #dee2e6;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        /* ========== ESTADO VACÍO ========== */
        .no-notes {
            text-align: center;
            color: #666;
            padding: 60px 20px;
        }
        
        .no-notes-icon {
            font-size: 4em;
            margin-bottom: 20px;
        }
        
        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav {
                gap: 10px;
            }
            
            .main-container {
                padding: 15px;
            }
            
            .page-title {
                font-size: 2em;
            }
            
            .form-container {
                margin: 0 -15px;
                border-radius: 0;
                padding: 20px;
            }
            
            .note-show-container {
                margin: 0 -15px;
                border-radius: 0;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .btn-group .btn {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="{{ route('notes.index') }}" class="logo">
                📒 NotesApp
            </a>
            
            <nav class="nav">
                <a href="{{ route('notes.index') }}" 
                   class="{{ request()->routeIs('notes.index') ? 'active' : '' }}">
                    📋 Mis Notas
                </a>
                <a href="{{ route('notes.create') }}" 
                   class="{{ request()->routeIs('notes.create') ? 'active' : '' }}">
                    ➕ Nueva Nota
                </a>
            </nav>
        </div>
    </header>

    <main class="main-container">
        {{-- Breadcrumbs --}}
        @if(View::hasSection('breadcrumbs'))
            <div class="breadcrumb">
                @yield('breadcrumbs')
            </div>
        @endif

        {{-- Mensajes flash --}}
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

        {{-- Header de página --}}
        @if(View::hasSection('page-header'))
            <div class="page-header">
                @yield('page-header')
            </div>
        @endif

        {{-- Contenido principal --}}
        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} NotesApp. Creado con ❤️ y Laravel</p>
    </footer>
</body>
</html>