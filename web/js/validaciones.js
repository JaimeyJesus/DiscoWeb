$(document).ready(inicializarEventos);  

    function inicializarEventos(){
        if ($(window).width() < 600) {

            cambiarMenu();
            maquetarFicheros();
            maquetarUsuarios();
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

    function maquetarFicheros(){
      $(".grid-item-cabecera").css("font-size", "0.7em");
      $(".grid-cabecera-ficheros").css("grid-template-columns",  "42vw 48vw");
      $(".grid-cabecera-ficheros").css("margin-top","-8vh");
      $(".grid-cabecera-ficheros").css("margin-left", "-4vw");
      $(".grid-item-cabecera").css("padding-top","2vh");
      $(".grid-ficheros").css("grid-template-columns",  "42vw 16vw 16vw 16vw 15vw 15vw 15vw");
      $(".grid-ficheros").css("height", "70vh");
      $(".grid-ficheros").css("width", "90vw");
      $(".grid-ficheros").css("padding-left", "0");
      $("#titulo").css("font-size", "2em");
      $("span").css("display", "none");
      $(".grid-item").css("height","8vh");
      $(".grid-item").css("padding-top","2vh");
      $("#cabTipo").css("display", "none");
      $("#cabFecha").css("display", "none");
      $("#cabTamaño").css("display", "none");
      $(".icono").css("width","6vw");
      $("#container").css("margin", "0");
      $("#container").css("width", "100vw");
      $("#container").css("height", "100vh");
      $(".grid-ficheros").css("margin-left", "-4vw");
      $(".grid-ficheros").css("margin-right", "0vw");
    }

    $(".grid-item").hover(function(){
        $(this).css("background-color", "rgba(200, 200, 200, 0.8)");
        $(this).css("color", "rgb(255, 0, 0)");
        }, function(){
        $(this).css("background-color", "rgba(255, 255, 255, 0.8)");
        $(this).css("color", "rgb(0, 0, 0)");
      }); 

}




