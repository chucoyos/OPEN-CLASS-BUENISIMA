<?php session_start();
if (isset($_SESSION['usuario'])) {
  require('model/ContactoDao.php');
  $dao = new ContactoDAO();
  $resultset = $dao->obtenerContactos();
  require('views/contenido.view.php');
} else {
  header('Location: login.php');
}
?>
