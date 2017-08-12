<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
      initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Iniciar Sesión</title>
  </head>
  <body>
    <div class="card divCentral">
      <h3 class="card-header">Iniciar Sesión</h3>
      <div class="card-block">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">

          <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Usuario" name="usuario" class="usuario">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
          </div>


          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
          </div>

          <?php if (!empty($errores)): ?>
            <div class="error">
              <ul>
                <?php echo $errores ?>
              </ul>
            </div>
          <?php endif; ?>

        </form>
        <p class="texto-registrate">
          ¿Aún no tienes cuenta?
          <a href="registro.php">Registrate</a>
        </p>
      </div>
    </div>
  </body>
</html>
