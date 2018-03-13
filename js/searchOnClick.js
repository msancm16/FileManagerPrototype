function searchNacimientos(){
    //var pagina = document.getElementById("page").value;
    $("#contenedor").empty();
    var apellido1 = document.getElementById("surname1").value;
    var apellido2 = document.getElementById("surname2").value;
    var nombre = document.getElementById("name").value;

    var elem = {
        //"pagina": pagina,
        "apellido1": apellido1,
        "apellido2": apellido2,
        "nombre": nombre
    };
    $.ajax({
      type: 'POST',
      data: elem,
      url: 'getNacimientos.php',
      dataType: "json",
      success: function(result) {
          $("#contenedor").empty();
        $.each(result, function(index, element){
          $("#contenedor").append("<div class='imagenes'><div class='section1'>"+
          //"<img id=\"" + element.ruta + "\" src=\"" + element.ruta + "\" alt='Imagen' width='250' height='250'>"+
          //"<object width=250 height=250 data=\""+element.ruta+ "\" type='image/tiff'><param name='negative' value='yes'></object>"+
          "<img  id=\"" + element.ruta + "\" width='250' height='250' src=\""+ element.ruta + "\" alt=''>" +
          "</div><div class='section2'><div class=''>"+
          //"<a id=\"" + element.ruta + "\" href= \""+ element.ruta +"\" target='_blank' class='verImagen'>Ver imagen</a>"+
          "<a onclick='zoom(\""+element.ruta+"\")'  class='verImagen'>Ver imagen</a>"+
          "</div><div class=''>"+
          //"<button type='submit' class='btn btn-default print' onClick='printImg(\""+element.ruta+"\")'>Imprimir</button></div></div>"+
          "<label class='containerC'>Seleccionar<input type='checkbox' id=\""+ element.ruta + "\"><span class='checkmark'></span></label></div></div>" +
          "<div class='section3'><p>Apellidos: " + element.apellido1 +" "+ element.apellido2 +"</p>"+
          "<p>Nombre: "+element.nombre +"</p><p>Página: "+ element.id +"</p></div></div>");
          });
      }
    });
}

function searchDefunciones(){
    //var pagina = document.getElementById("page").value;
    $("#contenedor").empty();
    var apellido1 = document.getElementById("surname1").value;
    var apellido2 = document.getElementById("surname2").value;
    var nombre = document.getElementById("name").value;

    var elem = {
        //"pagina": pagina,
        "apellido1": apellido1,
        "apellido2": apellido2,
        "nombre": nombre
    };
    $.ajax({
      type: 'POST',
      data: elem,
      url: 'getDefunciones.php',
      dataType: "json",
      success: function(result) {
          $("#contenedor").empty();
        $.each(result, function(index, element){
          $("#contenedor").append("<div class='imagenes'><div class='section1'>"+
          //"<img id=\"" + element.ruta + "\" src=\"" + element.ruta + "\" alt='Imagen' width='250' height='250'>"+
          //"<object width=250 height=250 data=\""+element.ruta+ "\" type='image/tiff'><param name='negative' value='yes'></object>"+
          "<img  id=\"" + element.ruta + "\" width='250' height='250' src=\""+ element.ruta + "\" alt=''>" +
          "</div><div class='section2'><div class=''>"+
          //"<a id=\"" + element.ruta + "\" href= \""+ element.ruta +"\" target='_blank' class='verImagen'>Ver imagen</a>"+
          "<a onclick='zoom(\""+element.ruta+"\")'  class='verImagen'>Ver imagen</a>"+
          "</div><div class=''>"+
          //"<button type='submit' class='btn btn-default print' onClick='printImg(\""+element.ruta+"\")'>Imprimir</button></div></div>"+
          "<label class='containerC'>Seleccionar<input type='checkbox' id=\""+ element.ruta + "\"><span class='checkmark'></span></label></div></div>" +
          "<div class='section3'><p>Apellidos: " + element.apellido1 +" "+ element.apellido2 +"</p>"+
          "<p>Nombre: "+element.nombre +"</p><p>Página: "+ element.id +"</p></div></div>");
          });
      }
    });
}

function searchMatrimonios(){
    //var pagina = document.getElementById("page").value;
    $("#contenedor").empty();
    var apellido1 = document.getElementById("surname1").value;
    var apellido2 = document.getElementById("surname2").value;
    var nombre = document.getElementById("name").value;

    var elem = {
        //"pagina": pagina,
        "apellido1": apellido1,
        "apellido2": apellido2,
        "nombre": nombre
    };
    $.ajax({
      type: 'POST',
      data: elem,
      url: 'getMatrimonios.php',
      dataType: "json",
      success: function(result) {
          $("#contenedor").empty();
        $.each(result, function(index, element){
          $("#contenedor").append("<div class='imagenes'><div class='section1'>"+
          //"<img id=\"" + element.ruta + "\" src=\"" + element.ruta + "\" alt='Imagen' width='250' height='250'>"+
          //"<object width=250 height=250 data=\""+element.ruta+ "\" type='image/tiff'><param name='negative' value='yes'></object>"+
          "<img  id=\"" + element.ruta + "\" width='250' height='250' src=\""+ element.ruta + "\" alt=''>" +
          "</div><div class='section22'><div class=''>"+
          //"<a id=\"" + element.ruta + "\" href= \""+ element.ruta +"\" target='_blank' class='verImagen'>Ver imagen</a>"+
          "<a onclick='zoom(\""+element.ruta+"\")'  class='verImagen'>Ver imagen</a>"+
          "</div><div class=''>"+
          //"<button type='submit' class='btn btn-default print' onClick='printImg(\""+element.ruta+"\")'>Imprimir</button></div></div>"+
          "<label class='containerC'>Seleccionar<input type='checkbox' id=\""+ element.ruta + "\"><span class='checkmark'></span></label></div></div>" +
          "<div class='section33'><p>Apellidos: " + element.apellido1a +" "+ element.apellido2a +"</p>"+
          "<p>Nombre: "+element.nombrea +"</p>"+
          "<p>Apellidos: " + element.apellido1b +" "+ element.apellido2b +"</p>"+
          "<p>Nombre: "+element.nombreb +"</p><p>Página: "+ element.id +"</p></div>");
          });
      }
    });
}
