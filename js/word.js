function openWordTest(){

    var mywindow = "";
    mywindow += "<html><head><title>Exporting to Word document</title>";
    mywindow += "</head><body><div id='page-content'>";

    $("input:checkbox:checked").each(function () {
        mywindow += '<img src="'+ $(this).attr("id") +'" alt="Imagen" width="900" height="1265">';
    });
    mywindow += "</div></body></html>";
    var elem = {
  	 "element": mywindow
  	};

    $.ajax({
            type: 'POST',
            url: 'wordtest.php',
            data: elem,
            dataType: "json",
            success: function (response) {
            },
            error: function () {
            }
    });
}

function dateF(dateObject) {
    var d = new Date(dateObject);
    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    var date = day + "/" + month + "/" + year;

    return date;
};

function getDate(){

  var monthNames = ["","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
  "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

  var dayNames = ["","uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once", "doce",
  "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "veintiuno",
  "veintidós", "ventitrés", "venticuatro", "venticinco", "ventiseis", "ventisiete", "veintiocho", "veintinueve",
  "treinta", "treinta y uno"];

  var yearNames = ["","Dos Mil Dieciocho", "Dos Mil Diecinueve", "Dos Mil Veinte", "Dos Mil Veintiuno", "Dos Mil Veintidós",
  "Dos Mil Veintitrés", "Dos Mil Veinticuatro", "Dos Mil Veinticinco", "Dos Mil Veintiseis", "Dos Mil Veintisiete",
  "Dos Mil Veintiocho", "Dos Mil Veintinueve", "Dos Mil Treinta", "Dos Mil Treinta y uno", "Dos Mil Treinta y dos"];

  var d = new Date();
  d = dateF(d);
  date = d.split("/");

  var day = dayNames[parseInt(date[0])];
  var month = monthNames[parseInt(date[1])];
  var year = yearNames[date[2]-2017];

  var date = "Carrocera a " + day + " de " + month + " de " + year + ".";
  return date;
}

function exportW(){
  //delete tmp because another one is being created
  $.ajax({
          url: 'deletetmp.php',
          data: {},
          success: function () {
            //alert("BORRADO");
          },
          error: function () {
          }
        });

  $('#wordExport').empty(); //Delete previous content that was hidden from the user

  var any = 0;
  $("input:checkbox:checked").each(function () {
    any = any + 1;
  });

  if(any == 0){
    alert("Selecciona al menos una imagen");
  } else if(any > 0){

    $("input:checkbox:checked").each(function () {
        $('#wordExport').append('<img src="'+ $(this).attr("id") +'" alt="Imagen" width="793" height="1122">');
    });

    //Add the footer to the word document
    $("#wordExport").append("<br>");

    $('#wordExport').append("<p id='titulo'>REGISTRO CIVIL DE CARROCERA –</p>");
    $("#titulo").css("font-size", "18.5px");
    $("#titulo").css("font-weight", "bold");
    $("#titulo").css("font-family", "Times New Roman");
    $("#titulo").css("text-decoration", "underline");

    $('#wordExport').append("<p id='subtitle'>PLAZA  MAYOR Nº 2 – 24123- CARROCERA – LEON</p>");
    $("#subtitle").css("font-size", "18.5px");
    $("#subtitle").css("font-weight", "bold");
    $("#subtitle").css("font-family", "Times New Roman");

    $("#wordExport").append("<br>");

    $('#wordExport').append("<p id='certifico'>CERTIFICO:</p>");
    $("#certifico").css("font-size", "18.5px");
    $("#certifico").css("font-weight", "bold");
    $("#certifico").css("font-family", "Calibri");
    $("#certifico").css("display", "inline");

    $('#wordExport').append("<p id='texto'>&nbsp &nbsp Que la presente fotocopia, está tomada del Libro xxxxxx Folio xxxxxx  Página  xxxxxxx de la Sección  xxxxx  de este Registro Civil. Debidamente compulsada se expide la misma de conformidad con lo autorizado por el Artículo 26 del Reglamento del Registro Civil.</p>");
    $("#texto").css("font-size", "18.5px");
    $("#texto").css("font-family", "Garamond");
    $("#texto").css("display", "inline");

  //  $("#wordExport").append("<br>");

    var date = getDate();
    $('#wordExport').append("<p id='fecha'>&nbsp &nbsp"+date+"</p>");
    $("#fecha").css("font-size", "18.5px");
    $("#fecha").css("font-family", "Garamond");

    $("#wordExport").append("<br>");

    $('#wordExport').append("<p id='partes'>&nbsp&nbsp&nbspLA JUEZA DE PAZ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEL SECRETARIO</p>");
    $("#partes").css("font-size", "18.5px");
    $("#partes").css("font-family", "Garamond");
    $("#partes").css("font-weight", "bold");

    $("#wordExport").append("<br><br><br><br><br><br><br>");

    $('#wordExport').append("<p id='partes2'>Dª  Rosalía Sastre Fernández&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJosé Balbino Álvarez Perez</p>");
    $("#partes2").css("font-size", "12px");
    $("#partes2").css("font-family", "Times New Roman");



    $.getScript('js/jquery.wordexport.js', function(){
        $("#wordExport").wordExport();
    });
  }

}
