<?php session_start();

require('model/ContactoDAO.php');

if (!isset($_SESSION['usuario'])) {
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  extract($_POST); // Datos de usuario, password y password2
  $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
  $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  $errores = "";
  if(empty($nombre) or empty($apellidos) or empty($telefono) or empty($email)) {
      $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
  } else {
    $dao = new ContactoDAO();
    $entity = new Contacto($nombre, $apellidos, $telefono, $email);
    $resultado = $dao->insertar($entity);
    var_dump($resultado);
    if(isset($otro)) header('Location: captura.php');
    else header('Location: contenido.php');
  }

}

require('views/captura.view.php');
?>
