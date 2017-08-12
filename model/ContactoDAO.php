<?php
require('dbaccess.php');
require('Contacto.php');
// SENTENCIAS SQL
define('SQL_INSERT_CONTACTO', 'INSERT INTO contacto(nombre, apellidos, email, telefono, eliminado) VALUES(?,?,?,?,?)');
define('SQL_ELIMINA_CONTACTO', 'UPDATE contacto SET eliminado=true WHERE id=?');
define('SQL_SELECT_CONTACTO', 'SELECT * FROM contacto WHERE eliminado=?');

class ContactoDAO {

    public function eliminar($idcontacto) {
      if($conexion = $this->obtenerConexion()) {
        $sentencia = $conexion->prepare(SQL_ELIMINA_CONTACTO);
        $sentencia->bindParam(1, $idcontacto);
        return $sentencia->execute();
      }
      return false;
    }

    public function insertar($contacto) {
      if($contacto instanceof Contacto) {
        if($conexion = $this->obtenerConexion()){
          $sentencia = $conexion->prepare(SQL_INSERT_CONTACTO);
          $sentencia->bindParam(1, $contacto->nombre);
          $sentencia->bindParam(2, $contacto->apellidos);
          $sentencia->bindParam(3, $contacto->email);
          $sentencia->bindParam(4, $contacto->telefono);
          $sentencia->bindParam(5, $contacto->eliminado);
          return $sentencia->execute();
        }
      }
      return $conexion;
    }

    public function obtenerContactos() {
      if($conexion = $this->obtenerConexion()) {
        $sentencia = $conexion->prepare(SQL_SELECT_CONTACTO);
        $sentencia->bindValue(1, false, PDO::PARAM_BOOL);
        if($sentencia->execute()) return $sentencia->fetchAll();
      }
      return false;
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
