<?php
  require_once 'modelos/Peticion.php';
  $consulta = new Peticion();

  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $nombre = $_POST['nombre'];

  $text = $consulta->peticionNacimientos($apellido1, $apellido2, $nombre);
  echo $text;
?>
