<!DOCTYPE html>
<html>
<head>
    <title>Registrar Requisito</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="ver_requisitos.php">📄 Ver Requisitos</a>
        <a href="registrar_requisito.php">➕ Registrar Requisito</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Registrar Requisito</h1>
        <form class="formulario" action="guardar_requisito.php" method="post">
            <label for="nombre">Nombre del Requisito:</label>
            <input type="text" name="nombre" required>

            <label for="tipo_documento">Tipo de Documento:</label>
            <select name="tipo_documento">
                <option value="Original">Original</option>
                <option value="Copia">Copia</option>
            </select>

            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>
</div>

</body>
</html>
