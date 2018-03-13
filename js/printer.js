function basicPrint() {
    window.print();
}


function printImg(ruta) {
    var content = document.getElementById(ruta).innerHTML;
    var src = document.getElementById(ruta).src;
    //src = src.substring(32);
    var mywindow = window.open('', 'Print', '_blank');
    mywindow.document.write('<html><head><title>Print</title>');
    mywindow.document.write('<style>@media print{margin:0;#header,#footer,#nav{display:none !important;}}</style>');
    mywindow.document.write('<style>html{margin: 0mm 0mm 0mm 0mm;</style>');
    mywindow.document.write('</head><body >');
    //mywindow.document.write('<object width="250" height="250" data="'+ ruta +'" type="image/tiff"><param name="negative" value="yes"></object>');
    mywindow.document.write('<img src="'+ ruta +'" alt="Imagen" width="1200" height="1265">');
    mywindow.document.write('</body></html>');
    mywindow.document.close();
    mywindow.focus();
    mywindow.print();
    mywindow.close();
    return true;
}

function printAll(){

  var mywindow = window.open('', 'Print', '_blank');
  mywindow.document.write('<html><head><title>Print</title>');
  mywindow.document.write('<style>@media print{margin:0;#header,#footer{display:none !important;}} img{margin:0;}');
  mywindow.document.write('body, h1, h2, h3, ol, ul, div {width:auto;border:0;margin:0;padding:0;float:none;position:static;overflow:visible;}</style>');
  mywindow.document.write('</head><body >');

  $("input:checkbox:checked").each(function () {
      mywindow.document.write('<img src="'+ $(this).attr("id") +'" alt="Imagen" width="900" height="1265">');
  });
  mywindow.document.write('</body></html>');
  mywindow.document.close();
  mywindow.focus();
  mywindow.print();
  mywindow.close();
  return true;
}

function try1(ruta){
  var content = document.getElementById(ruta).innerHTML;
  var src = document.getElementById(ruta).src;
  var mywindow = window.open('', 'Print', '_blank');
  mywindow.document.write(ruta)
  mywindow.document.close();
  mywindow.focus();
  mywindow.print();
  mywindow.close();
  return true;
}
