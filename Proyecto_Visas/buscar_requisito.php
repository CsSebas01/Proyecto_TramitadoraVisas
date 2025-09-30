<!DOCTYPE html>
<html>
<head>
    <title>Buscar Requisito</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="ver_requisitos.php">📄 Ver Requisitos</a>
        <a href="buscar_requisito.php">🔍 Buscar Requisito</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Buscar Requisito</h1>
        <form class="formulario" method="get" action="resultado_busqueda_requisito.php">
            <label for="nombre">Nombre del Requisito:</label>
            <input type="text" name="nombre" required>

            <button type="submit" class="btn">Buscar</button>
        </form>
    </div>
</div>

</body>
</html>
