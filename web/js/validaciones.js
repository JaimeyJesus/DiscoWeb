$(document).ready(InicializarEventos);
function InicializarEventos(){
    var x=$(".icono");
    var z=$("#icono2");
    var y=$("#icono3");
    x.hover(entraMouse);
    z.hover(entraMouse2);
    y.hover(entraMouse3);
}
function entraMouse(x){
    var y=$("#accionIcono");
    y.toggle();
}
function entraMouse2(x){
    var z=$("#accionIcono2");
    z.toggle();
}
function entraMouse3(x){
    var x=$("#accionIcono3");
    x.toggle();
}


