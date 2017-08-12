<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
      initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Contenido</title>
  </head>
  <body>
    <div class="card divCentral">
      <h3 class="card-header">Contactos registrados</h3>
      <div class="card-block">
        <?php foreach ($resultset as $fila): ?>

          <div class="card" style="margin-bottom: 10px;">
            <div class="card-header">
              <?php echo $fila['nombre'] . " " . $fila['apellidos']; ?>
            </div>
            <div class="card-block">
              <p class="card-text">Tel: <?php echo $fila['telefono']; ?></p>
              <p class="card-text">Email: <?php echo $fila['email']; ?></p>
            </div>
          </div>

        <?php endforeach; ?>
      </div>
      <div class="card-footer">
        <div class="btn_toolbar-justify-content-between">
          <a href="captura.php" class="btn btn-primary btn-block">Registrar Contactos</a>
          <a href="cerrar.php" class="btn btn-secondary btn-block">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </body>
</html>
