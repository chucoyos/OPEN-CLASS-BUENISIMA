<?php
  require('model/ContactoDao.php');

  $dao = new ContactoDAO();
  $contacto = new Contacto('Alejandro','Téllez', '5554443333', 'alejandro@correo.com');
  $resultado = $dao->insertar($contacto);
  $resultset = $dao->obtenerContactos();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Demo</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <div class="card divCentral">
      <h3 class="card-header">Featured</h3>
      <div class="card-block">
        <ul class="list-group">
          <?php foreach ($resultset as $fila): ?>
            <li class="list-group-item"><?php echo $fila['nombre']; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </body>
</html>
