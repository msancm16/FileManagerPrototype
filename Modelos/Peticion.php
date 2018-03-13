<?php
require_once 'dbconfig.php';
class Peticion{
  public $db;

  public function __construct(){
    $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $this->db->set_charset("utf8");
    if(mysqli_connect_errno()) {
      echo "Error: No se pudo conectar a la base de datos.";
      exit;
    }
  }

  function peticionNacimientos($apellido1, $apellido2, $nombre){
    if($nombre == "" && $apellido1 != "" && $apellido2 != ""){ //Deja el campo de nombre en blanco, buscara aquellas entradas con esos dos apellidos
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE apellido1 = '$apellido1' AND apellido2 = '$apellido2' ORDER BY id";
    } else if($apellido1 == "" && $nombre != "" && $apellido2 != ""){ //Deja el campo de apellido1 en blanco
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE nombre = '$nombre' AND apellido2 = '$apellido2' ORDER BY id";
    } else if($apellido2 == "" && $apellido1 != "" && $nombre != ""){ //Deja el campo de apellido2 en blanco
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE apellido1 = '$apellido1' AND nombre = '$nombre' ORDER BY id";
    } else if($nombre !="" && $apellido1 != "" && $apellido2 != ""){ //Introduce todos los campos
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE apellido1 = '$apellido1' AND apellido2 = '$apellido2' AND nombre = '$nombre' ORDER BY id";
    } else if($nombre != ""){ //Solo relleno el campo del nombre
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE nombre = '$nombre' ORDER BY id";
    } else if($apellido1 != ""){ //SOlo introdujo el apellido1
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE apellido1 = '$apellido1' ORDER BY id";
    } else if($apellido2 != ""){
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM nacimientos WHERE apellido2 = '$apellido2' ORDER BY id";
    }

    $result = $this->db->query($sql);

    if($result->num_rows > 0){
        $string = "";
      while($row = $result->fetch_assoc()){
        /*$string .=  "<div class='imagenes'><div class='section1'>";
        $string .=  "<img src=Imagenes/$row[ruta] alt='Imagen' width='250' height='250'>";
        $string .= "</div><div class='section2'><div class=''>";
        $string .= "<a id=$row[ruta] href=Imagenes/$row[ruta] class='verImagen'>Ver imagen</a>";
        $string .= "</div><div class=''>";
        $string .= "<button type='submit' class='btn btn-default print' onclick='printImg('$row[ruta]')'>Imprimir</button></div></div>";
        $string .= "<div class='section3'><p>Apellidos: $row[apellido1] $row[apellido2]</p>";
        $string .= "<p>Nombre: $row[nombre]</p><p>Página: $row[id]</p><p>Imagen: $row[ruta]</p></div></div>";*/
        $list[] = $row;
      }
      return json_encode($list);
    } else{
      return "No entry found";
    }
  }

  function peticionDefunciones($apellido1, $apellido2, $nombre){
    if($nombre == "" && $apellido1 != "" && $apellido2 != ""){ //Deja el campo de nombre en blanco, buscara aquellas entradas con esos dos apellidos
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE apellido1 = '$apellido1' AND apellido2 = '$apellido2' ORDER BY id";
    } else if($apellido1 == "" && $nombre != "" && $apellido2 != ""){ //Deja el campo de apellido1 en blanco
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE nombre = '$nombre' AND apellido2 = '$apellido2' ORDER BY id";
    } else if($apellido2 == "" && $apellido1 != "" && $nombre != ""){ //Deja el campo de apellido2 en blanco
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE apellido1 = '$apellido1' AND nombre = '$nombre' ORDER BY id";
    } else if($nombre !="" && $apellido1 != "" && $apellido2 != ""){ //Introduce todos los campos
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE apellido1 = '$apellido1' AND apellido2 = '$apellido2' AND nombre = '$nombre' ORDER BY id";
    } else if($nombre != ""){ //Solo relleno el campo del nombre
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE nombre = '$nombre' ORDER BY id";
    } else if($apellido1 != ""){ //SOlo introdujo el apellido1
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE apellido1 = '$apellido1' ORDER BY id";
    } else if($apellido2 != ""){
      $sql = "SELECT id, apellido1, apellido2, nombre, ruta FROM defunciones WHERE apellido2 = '$apellido2' ORDER BY id";
    }

    $result = $this->db->query($sql);

    if($result->num_rows > 0){
        $string = "";
      while($row = $result->fetch_assoc()){
        /*$string .=  "<div class='imagenes'><div class='section1'>";
        $string .=  "<img src=Imagenes/$row[ruta] alt='Imagen' width='250' height='250'>";
        $string .= "</div><div class='section2'><div class=''>";
        $string .= "<a id=$row[ruta] href=Imagenes/$row[ruta] class='verImagen'>Ver imagen</a>";
        $string .= "</div><div class=''>";
        $string .= "<button type='submit' class='btn btn-default print' onclick='printImg('$row[ruta]')'>Imprimir</button></div></div>";
        $string .= "<div class='section3'><p>Apellidos: $row[apellido1] $row[apellido2]</p>";
        $string .= "<p>Nombre: $row[nombre]</p><p>Página: $row[id]</p><p>Imagen: $row[ruta]</p></div></div>";*/
        $list[] = $row;
      }
      return json_encode($list);
    } else{
      return "No entry found";
    }
  }

  function peticionMatrimonios($apellido1, $apellido2, $nombre){
    if($nombre == "" && $apellido1 != "" && $apellido2 != ""){ //Deja el campo de nombre en blanco, buscara aquellas entradas con esos dos apellidos
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE apellido1a = '$apellido1' AND apellido2a = '$apellido2' OR apellido1b = '$apellido1' AND apellido2b = '$apellido2'  ORDER BY id";
    } else if($apellido1 == "" && $nombre != "" && $apellido2 != ""){ //Deja el campo de apellido1 en blanco
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE nombrea = '$nombre' AND apellido2a = '$apellido2' OR nombreb = '$nombre' AND apellido2b = '$apellido2' ORDER BY id";
    } else if($apellido2 == "" && $apellido1 != "" && $nombre != ""){ //Deja el campo de apellido2 en blanco
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE apellido1a = '$apellido1' AND nombrea = '$nombre' OR apellido1b = '$apellido1' AND nombreb = '$nombre' ORDER BY id";
    } else if($nombre !="" && $apellido1 != "" && $apellido2 != ""){ //Introduce todos los campos
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE apellido1a = '$apellido1' AND apellido2a = '$apellido2' AND nombrea = '$nombre' OR apellido1b = '$apellido1' AND apellido2b = '$apellido2' AND nombreb = '$nombre' ORDER BY id";
    } else if($nombre != ""){ //Solo relleno el campo del nombre
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE nombrea = '$nombre' OR nombreb = '$nombre' ORDER BY id";
    } else if($apellido1 != ""){ //SOlo introdujo el apellido1
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE apellido1a = '$apellido1' OR apellido1b = '$apellido1' ORDER BY id";
    } else if($apellido2 != ""){
      $sql = "SELECT id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta FROM matrimonios WHERE apellido2a = '$apellido2' OR apellido2b = '$apellido2' ORDER BY id";
    }

    $result = $this->db->query($sql);

    if($result->num_rows > 0){
        $string = "";
      while($row = $result->fetch_assoc()){
        /*$string .=  "<div class='imagenes'><div class='section1'>";
        $string .=  "<img src=Imagenes/$row[ruta] alt='Imagen' width='250' height='250'>";
        $string .= "</div><div class='section2'><div class=''>";
        $string .= "<a id=$row[ruta] href=Imagenes/$row[ruta] class='verImagen'>Ver imagen</a>";
        $string .= "</div><div class=''>";
        $string .= "<button type='submit' class='btn btn-default print' onclick='printImg('$row[ruta]')'>Imprimir</button></div></div>";
        $string .= "<div class='section3'><p>Apellidos: $row[apellido1] $row[apellido2]</p>";
        $string .= "<p>Nombre: $row[nombre]</p><p>Página: $row[id]</p><p>Imagen: $row[ruta]</p></div></div>";*/
        $list[] = $row;
      }
      return json_encode($list);
    } else{
      return "No entry found";
    }
  }


}
?>
