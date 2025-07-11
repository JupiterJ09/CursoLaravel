<!DOCTYPE html>
<html>
<head>
    <title>About me </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgb(20, 75, 115);
        }
        .container {
            background: #D6E8F5; ;
            padding: 30px;
            border-radius: 100px;
            box-shadow: 0px 2px 0px rgba(237, 199, 122, 0.1);
        }
        h1 {
            color: rgb(36, 58, 156);
            text-align: center;
        }
        h3{
            color: rgb(20, 115, 112);
        }
        p {
            color: green;
            line-height: 1.6;
        }
        .information{
            background: rgb(101, 188, 222);
            padding: 50px; 
            border-radius: 10px;
            box-shadow:  0 2px 20px rgba(82, 134, 195, 0.1);
            text-align: center;
        }
        .database-info{

            background: #e8f4fd;
            border: 1px solid #bee5eb;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;

        }     
    </style>
</head>
<body>
    <div class="container">
        <h1>Sobre mi</h1>

        <div class="database-info">
    <h2>📊 Conexión a Base de Datos</h2>
    <p><strong>Total de notas guardadas:</strong> {{ $totalNotas }}</p>
    <p><em>Esta información viene directamente de mi base de datos 'curso'</em></p>
    
    @if($totalNotas == 0)
        <p style="color: #28a745;">✅ Base de datos conectada correctamente (tabla vacía)</p>
    @else
        <p style="color: #28a745;">✅ Base de datos funcionando con {{ $totalNotas }} notas</p>
    @endif
</div>
        
        <div class="information">
            <strong>Estas haciendo un gran trabajo sigue asi </strong> 
            Sigue de esa manera 
        </div>
        
        <h2><strong>Metas verdaderas</strong></h2>
        <div class="feature-list">
            <ul>
                <li><strong>La idea es equivocarme</strong> - Cada dia aunque voy progresando </li>
                <li><strong>He dado el primer paso y me gusta intentarlo </strong> </li>
                <li><strong>Estoy estudiando acerca de Flutter</strong> Primero nos estamos enfocando en mejorar en web</li>
                <li><strong>Mis logros no son menos que los de los demas</strong> Me gusta saber que confiamos en nosotros</li>
            </ul>
        </div>
        
        <h3><strong>Me gusta la idea:</strong> </h3>
        <ul>
            <li>De crear cosas que conecten verdaderamente con las personas</li>
            <li>De cada poder mejorar y eso me llena</li>
            <li>De la persona en la que me estoy convirtiendo</li>
        </ul>

    </div>
</body>
</html>