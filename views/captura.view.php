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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="captura">
    <div class="card divCentral">
      <h3 class="card-header">Registro de Contactos</h3>
      <div class="card-block">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" placeholder="Teléfono" name="telefono">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
          </div>
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="otro">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Ingresar otro registro</span>
          </label>
      </div>
      <div class="card-footer">
        <div class="btn_toolbar-justify-content-between">
          <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
          <a href="contenido.php" class="btn btn-secondary btn-block">Regresar</a>
        </div>
      </div>
    </div>
    </form>
  </body>
</html>
