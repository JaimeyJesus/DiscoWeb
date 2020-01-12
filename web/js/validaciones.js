$(document).ready(inicializarEventos);
    var nombre = $("#nombre");
    var tipo = $("#tipo");
    var fecha = $("#fecha");
    var cabTipo = $("#cabTipo");
    var cabFecha = $("#cabFecha");
    var cabecera = $(".grid-cabecera-ficheros");
    var ficheros = $(".grid-ficheros");
    var fichero = $(".grid-item");
    

    function inicializarEventos(){
        if ($(window).width() < 700) {

            cambiarMenu();
            $(".grid-item-cabecera").css("font-size", "0.7em");
            cabecera.css("grid-template-columns",  "24.46vw 12vw 39vw");
            cabecera.css("margin-top","5vh");
            ficheros.css("grid-template-columns",  "24.46vw 12vw 13vw 13vw 13vw");
            $("#titulo").css("font-size", "2em");
            tipo.css("display", "none");
            fecha.css("display", "none");
            cabTipo.css("display", "none");
            cabFecha.css("display", "none");
            //$("span").css("display", "none");
            fichero.css("height","15vh");
            ficheros.css("height", "96vh");
        }

    function cambiarMenu(){
        $("<select  class='form-control' id='menu'/>").appendTo("nav");
        $("<option/>", {
        "selected": "selected",
        "value"   : "",
        "text"    : "MENÚ"
        }).appendTo("nav select");

        $("nav a").each(function() {
        var el = $(this);
        $("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo("nav select");
        });

        $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
        });
    }

    $(".grid-item").hover(function(){
        $(this).css("background-color", "rgba(200, 200, 200, 0.8)");
        $(this).css("color", "rgb(255, 0, 0)");
        }, function(){
        $(this).css("background-color", "rgba(255, 255, 255, 0.8)");
        $(this).css("color", "rgb(0, 0, 0)");
      });

      $(document).on('change','.btn-file :file',function(){
        var input = $(this);
        var numFiles = input.get(0).files ? input.get(0).files.length : 1;
        var label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
        input.trigger('fileselect',[numFiles,label]);
      });
      $(document).ready(function(){
        $('.btn-file :file').on('fileselect',function(event,numFiles,label){
          var input = $(this).parents('.input-group').find(':text');
          var log = numFiles > 1 ? numFiles + ' files selected' : label;
          if(input.length){ input.val(log); }else{ if (log) alert(log); }
        });
      });

 

}




