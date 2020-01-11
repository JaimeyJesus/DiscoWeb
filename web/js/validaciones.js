$(document).ready(InicializarEventos);
function InicializarEventos(){
    var x=$("#icono");
    var z=$("#icono2");
    var y=$("#icono3");
    var q= $("#Descarga");
    x.hover(entraMouse);
    z.hover(entraMouse2);
    y.hover(entraMouse3);
    q.hover(entraMouse4);
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
function entraMouse4(x){
    var x=$("#accionDescarga");
    x.toggle();
}


