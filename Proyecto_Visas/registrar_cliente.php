<!DOCTYPE html>
<html>
<head>
    <title>Registrar Cliente</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="ver_clientes.php">📄 Ver Clientes</a>
        <a href="registrar_cliente.php">➕ Registrar Cliente</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Registrar Nuevo Cliente</h1>
        <form class="formulario" action="guardar_cliente.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" required>

            <label for="telefono">Número de teléfono:</label>
            <input type="text" name="telefono" required>

            <label for="tipo_visa">Tipo de visa:</label>
            <input type="text" name="tipo_visa" required>

            <div class="fila-doble">
    <div class="campo">
        <label for="tipo_tramite">Tipo de trámite:</label>
        <select name="tipo_tramite" required>
            <option value="">Selecciona</option>
            <option value="Reagrupación">Reagrupación</option>
            <option value="Turismo">Turismo</option>
            <option value="Trabajo">Trabajo</option>
        </select>
    </div>

    <div class="campo">
        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="">Selecciona</option>
            <option value="En proceso">En proceso</option>
            <option value="Denegado">Denegado</option>
            <option value="Cancelado">Cancelado</option>
            <option value="Suspendido">Suspendido</option>
            <option value="Aprobado">Aprobado</option>
        </select>
    </div>
</div>

<div class="campo">
        <label for="activo">Actividad:</label>
        <select name="activo" required>
            <option value="">Selecciona</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>


            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones"></textarea>

            

            <button type="submit" class="btn">Guardar Cliente</button>
        </form>
    </div>
</div>

</body>
</html>
