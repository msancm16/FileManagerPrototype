<!DOCTYPE html>
<?php
  error_reporting(0);
  ini_set('display_errors', 0);
  include 'modelos/Peticion.php';
  $peticion = new Peticion();
  //include "getFiles.php";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nacimientos</title>
    <script src="js/zoom.js"></script>
    <script src="js/searchOnClick.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/FileSaver.js"></script>
    <script src="js/jquery.wordexport.js"></script>
    <script src="js/printer.js"></script>
    <script src="js/dropdownMenu.js"></script>
    <script src="js/word.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script>
    jQuery(document).ready(function($) {
      $('input[type=text]').on('keydown', function(e) {
        if (e.which == 13) {
            searchNacimientos();
        }
      });
    });
    </script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="header">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="Imagenes/escudo_fondo_transparente.png" alt="Logo" width="50" height="50">
                <!--<a class="navbar-brand" href="Imagenes/escudo_fondo_transparente.png"><span class="glyphicon glyphicon-globe"></span> Logo</a>  -->
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a onmouseover="drop()" onmouseout="deDrop()">Búsquedas</a>
                        <div class="dropdown-content" id="dropContent" onmouseover="drop()" onmouseout="deDrop()">
                          <a href="index.php">Partidas de Nacimiento</a>
                          <a href="defunciones.php">Defunciones</a>
                          <a href="matrimonios.php">Matrimonios</a>
                        </div>
                    </li>
                    <li>
                        <a href="actualizarBaseDatos.php">Actualizar BD</a>
                    </li>
                </ul>

				<!-- Search -->
				<!--  <form class="navbar-form navbar-right" role="search">  -->
        <div class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<!--<input id="page" type="text" class="form-control" placeholder="Número de página">-->
            <input id="surname1" type="text" class="form-control" placeholder="Apellido 1">
            <input id="surname2" type="text" class="form-control" placeholder="Apellido 2">
            <input id="name" type="text" class="form-control" placeholder="Nombre">
					</div>
					<button id="btnSearch" type="" class="btn btn-default searchbtn" onclick=searchNacimientos()><span class="glyphicon glyphicon-search"></span> Buscar</button>
				<!-- </form> -->
      </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <button class='printerButton' onClick="printAll()">Imprimir</button>
    <button class='wordButton' onClick="exportW()">Word</button>
    <div class="" id="contenedor">

    </div>

    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
    </div>

  <div id="wordExport">
  </div>

	<footer>
        <div class="small-print">
        	<div class="container">
        	</div>
        </div>
	</footer>


    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- IE10 viewport bug workaround -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>

	<!-- Placeholder Images -->
	<script src="js/holder.min.js"></script>

</body>

</html>
