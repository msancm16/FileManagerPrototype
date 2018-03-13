<?php
  function actualizar(){
    include 'dbconfig.php';

    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $db->set_charset("utf8");
    if(mysqli_connect_errno()) {
      echo "Error: No se pudo conectar a la base de datos.";
      exit;
    }

    //************** NACIMIENTOS ****************

    $directorio = "Imagenes/Nacimientos";
    //$images = glob($directorio . "*.jpg");
    $images = scandir($directorio);
    unset($images[0]);
    unset($images[1]);
    $contador = 0;
    //pagina_ap1_ap2_nombre.jpg
    //pagina_ap1_ap2_nombre_subpagina.jpg
    foreach($images as $image){
      $ruta = "Imagenes/Nacimientos/".$image ;
      $string = explode(".", $image);
      //String[0] = numero_apellido1_appelido2_nombre || String[1] = extension
      //String[0] = numero_apellido1_appelido2_nombre_subpagina || String[1] = extension
      $string = explode("_", $string[0]);
      $pagina = $string[0];
      $apellido1 = $string[1];
      $apellido2 = $string[2];
      $nombre = $string[3];
      if(sizeOf($string) == 4){
      $subpagina = 0;
      } else if(sizeOf($string) == 5){
      $subpagina = $string[4];
      }
      $sql = "INSERT INTO nacimientos (id, apellido1, apellido2, nombre, ruta, subpagina) VALUES ('$pagina','$apellido1','$apellido2','$nombre','$ruta','$subpagina')";
      $result = $db->query($sql);

      if($result){
          echo "<p>La imagen : ";
          echo $ruta;
          echo " fue añadida a la base de datos.</p>";
      } else {
          $contador = $contador + 1; //Numero de imagenes que ya estan en la base de datos.

      }
    }
    echo "<p>Error insertando : ";
    echo $contador;
    echo " imágenes en NACIMIENTOS( WARNING: El archivo ya se encontraba en la base de datos. )";
    echo "</p>";

    // ************* DEFUNCIONES *****************

    $directorio = "Imagenes/Defunciones";
    //$images = glob($directorio . "*.jpg");
    $images = scandir($directorio);
    unset($images[0]);
    unset($images[1]);
    $contador = 0;

    foreach($images as $image){
      $ruta = "Imagenes/Defunciones/".$image ;
      $string = explode(".", $image);
      //String[0] = numero_apellido1_appelido2_nombre || String[1] = extension
      $string = explode("_", $string[0]);
      $pagina = $string[0];
      $apellido1 = $string[1];
      $apellido2 = $string[2];
      $nombre = $string[3];
      $sql = "INSERT INTO defunciones (id, apellido1, apellido2, nombre, ruta) VALUES ('$pagina','$apellido1','$apellido2','$nombre','$ruta')";
      $result = $db->query($sql);

      if($result){
          echo "<p>La imagen : ";
          echo $ruta;
          echo " fue añadida a la base de datos.</p>";
      } else {
          $contador = $contador + 1; //Numero de imagenes que ya estan en la base de datos.

      }
    }
    echo "<p>Error insertando : ";
    echo $contador;
    echo " imágenes en DEFUNCIONES( WARNING: El archivo ya se encontraba en la base de datos. )";
    echo "</p>";

    // ************* MATRIMONIOS *****************

    $directorio = "Imagenes/Matrimonios";
    //$images = glob($directorio . "*.jpg");
    $images = scandir($directorio);
    unset($images[0]);
    unset($images[1]);
    $contador = 0;

    foreach($images as $image){
      $ruta = "Imagenes/Matrimonios/".$image ;
      $string = explode(".", $image);
      //String[0] = numero_ap1A_ap2A-nombreA_ap1B_ap2B_nombreB
      $partes = explode("-", $string[0]); //partes[0] PRIMERA PERSONA --- partes[1] SEGUNDA
      $stringA = explode("_", $partes[0]);
      $stringB = explode("_", $partes[1]);
      $pagina = $stringA[0];
      $apellido1A = $stringA[1];
      $apellido2A = $stringA[2];
      $nombreA = $stringA[3];

      $apellido1B = $stringB[0];
      $apellido2B = $stringB[1];
      $nombreB = $stringB[2];

      $sql = "INSERT INTO matrimonios (id, apellido1a, apellido2a, nombrea, apellido1b, apellido2b, nombreb, ruta) VALUES ('$pagina','$apellido1A','$apellido2A','$nombreA','$apellido1B','$apellido2B','$nombreB','$ruta')";
      $result = $db->query($sql);

      if($result){
          echo "<p>La imagen : ";
          echo $ruta;
          echo " fue añadida a la base de datos.</p>";
      } else {
          $contador = $contador + 1; //Numero de imagenes que ya estan en la base de datos.

      }
    }
    echo "<p>Error insertando : ";
    echo $contador;
    echo " imágenes en MATRIMONIOS( WARNING: El archivo ya se encontraba en la base de datos. )";
    echo "</p>";
  }
?>
