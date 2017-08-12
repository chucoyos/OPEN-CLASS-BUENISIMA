<?php
require('dbaccess.php');

// SENTENCIAS SQL
define('SQL_SELECT_LOGIN', 'SELECT * FROM usuario WHERE nombre=? AND password=?');
define('SQL_SELECT_USERNAME', 'SELECT * FROM usuario WHERE nombre=:nombre LIMIT 1');
define('SQL_INSERT_CREDENCIALES','INSERT INTO usuario (nombre, password) VALUES(?,?)');

class LoginDAO {

    public function login($usuario, $password) {
      $conexion = $this->obtenerConexion();
      $statement = $conexion->prepare(SQL_SELECT_LOGIN);
      $statement->bindParam(1, $usuario);
      $statement->bindParam(2, $password);
      $statement->execute();
      return $statement->fetch();
    }

    public function verificarUsername($usuario) {
      $conexion = $this->obtenerConexion();
      $statement = $conexion->prepare(SQL_SELECT_USERNAME);
      $statement->execute([':nombre' => $usuario]);
      return $statement->fetch(); // Si no hay resultset variable resultado será false
    }

    public function insertarCredenciales($usuario, $password) {
      $conexion = $this->obtenerConexion();
      $statement = $conexion->prepare(SQL_INSERT_CREDENCIALES);
      $statement->bindParam(1, $usuario);
      $statement->bindParam(2, $password);
      return $statement->execute();
    }

    private function obtenerConexion() {
      try {
        $conexion = new PDO(DSN, USERNAME, PASSWORD);
      } catch (PDOException $e) {
        echo "### ERROR: $e->getMessage()";
        $conexion = false;
      }
      return $conexion;
    }
}
?>
