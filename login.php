<?php
session_start();
require('model/LoginDAO.php');

$errores = '';

if (isset($_SESSION['usuario'])) {
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $dao = new LoginDAO();
  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  $password = hash('sha512', $_POST['password']);

  $resultado = $dao->login($usuario, $password);
  if($resultado !== false) {
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
  } else {
    $errores .= '<li>Datos incorrectos</li>';
  }
}
require('views/login.view.php');
?>
