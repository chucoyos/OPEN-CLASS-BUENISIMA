<?php
  session_start();
  $_SESSION = array(); // Destruye las variables globales asociadas con la sesión.
  session_destroy();
  header('Location: login.php');
?>
