<?php session_start();
if (isset($_SESSION['usuario'])) {
  require('model/ContactoDao.php');
  $dao = new ContactoDAO();
  $contacto = new Contacto('Alejandro','Téllez', '5554443333', 'alejandro@correo.com');
  $resultado = $dao->insertar($contacto);
  $resultset = $dao->obtenerContactos();
  require('views/contenido.view.php');
} else {
  header('Location: login.php');
}
?>
