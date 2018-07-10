//script de favoritos
function cargafavorite() {
    //recuperar favoritos y cambiar coloración del corazón
    var id_values = document.cookie.replace(/(?:(?:^|.*;\s*)id\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var captura_id = id_values.split(",");
    for (var i in captura_id) {
        if(captura_id[i] != ""){
            var e = "#"+captura_id[i];
            $(e).addClass("fa-heart").removeClass("fa-heart-o");
        }    
    }
}

function changefavorite(e) {
    var catureclass = $(e).attr('class'); // catura de la clase para comparar
    var id_prod = $(e).attr('id'); // extracción del id
    //datos para guardar cookies
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    //capturas de ids contenidos en la cookies con la clave id
    var id_values = document.cookie.replace(/(?:(?:^|.*;\s*)id\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    
    //guardar cookies y agregar efecto corazón
    if (catureclass == "favorite fa fa-heart-o") {
        $(e).addClass("fa-heart").removeClass("fa-heart-o");
        if (id_values == '' || id_values == 'undefined') {
            var guardar_id = id_prod;
            document.cookie = "id=" + guardar_id + ";" + expires + ";path=/";

        }else{
            var guardar_id = id_values+","+id_prod;
            document.cookie = "id=" + guardar_id + ";" + expires + ";path=/";
        } 
    }else{//eliminar id de cookies y agregar efecto corazón
        $(e).addClass("fa-heart-o").removeClass("fa-heart");
        var captura_id = id_values.split(",");
        var seleccion;
        var entrada = 1;
        for (var i in captura_id) {
            if(entrada == 1 && captura_id[i] != id_prod && captura_id[i] != 'undefined'){
                seleccion = captura_id[i];
                entrada=0;
            }
            else if(captura_id[i] != id_prod && captura_id[i] != 'undefined'){
                seleccion = seleccion+","+captura_id[i];
            }
        }
        document.cookie = "id=" + seleccion + ";" + expires + ";path=/";
    }
}