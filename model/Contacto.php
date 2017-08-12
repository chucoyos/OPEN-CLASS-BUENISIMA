<?php
class Contacto {
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $eliminado;

    public function __construct($nombre, $apellidos, $telefono, $email) {
      $this->nombre = $nombre;
      $this->apellidos = $apellidos;
      $this->email = $email;
      $this->telefono = $telefono;
      $this->eliminado = false;
    }
}
?>
