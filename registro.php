<?php
  session_start();
  require('model/LoginDAO.php');
  
  if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST); // Datos de usuario, password y password2
    $usuario = filter_var(strtolower($usuario), FILTER_SANITIZE_STRING);
    $password = hash('sha512',$password);
    $password2 = hash('sha512',$password2);

    $errores = "";
    if(empty($usuario) or empty($password) or empty($password2)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
      $dao = new LoginDAO();

      $resultado = $dao->verificarUsername($usuario); // Si no hay resultset variable resultado será false
      if ($resultado != false) {
        $errores .= '<li>El nombre de usuario ya existe</li>';
      }

      if ($password != $password2) {
        $errores .= '<li>Las contraseñas no son iguales</li>';
      }

    }
    if($errores == '') {
      $dao->insertarCredenciales($usuario, $password);
      header('Location: login.php');
    }
  }
  require('views/registro.view.php');
?>
