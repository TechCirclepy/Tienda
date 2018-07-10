function megusta(e) {
    var token = '{{Session::token()}}';
    var id_prod = $(e).attr('id');
    var cant = $(e).attr('data');
    var sum = parseInt(cant)+1;
    var res = parseInt(cant)-1;
    var enviar = 0;
    var existe = false;
    //datos para guardar cookies
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    //capturas de ids contenidos en la cookies con la clave id
    var id_values = document.cookie.replace(/(?:(?:^|.*;\s*)megusta\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    var captura_id = id_values.split(",");
    
    for (var i in captura_id) {
        if(captura_id[i] == id_prod){
            existe = true;
        }    
    }
    var seleccion;
    var entrada = 1;
    if (existe == true) {
        for (var i in captura_id) {
            if(entrada == 1 && captura_id[i] != id_prod && captura_id[i] != 'undefined'){
                seleccion = captura_id[i];
                entrada=0;
            }
            else if(captura_id[i] != id_prod && captura_id[i] != 'undefined'){
                seleccion = seleccion+","+captura_id[i];
            }
        }
        document.cookie = "megusta=" + seleccion + ";" + expires + ";path=/"
        $(e).attr("data", res);
        enviar=res;
        $(e).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>('+ res +')');
        alertify.error('<i style="color: #FFFFFF;">Este producto ya no te gusta</i>');
    }else{
        if (id_values == '' || id_values == 'undefined') {
            var guardar_id = id_prod;
            document.cookie = "megusta=" + guardar_id + ";" + expires + ";path=/";
            $(e).attr("data", sum);
            enviar=sum;
            $(e).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>('+ sum +')');
            alertify.success('<i style="color: #FFFFFF;">Este producto te gusta</i>');
        }else{
            var guardar_id = id_values+","+id_prod;
            document.cookie = "megusta=" + guardar_id + ";" + expires + ";path=/";
            $(e).attr("data", sum);
            enviar=sum;
            $(e).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>('+ sum +')');
            alertify.success('<i style="color: #FFFFFF;">Este producto te gusta</i>');
        } 
    }
    var formData = {
        cantidad: enviar,
    }
    type = "POST"; // para actualizar recursos existentes
    my_url = 'editmegusta/' + id_prod;
    
    console.log(formData);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function nomegusta(e) {
    var token = '{{Session::token()}}';
    var id_prod = $(e).attr('id');
    var cant = $(e).attr('data');
    var sum = parseInt(cant)+1;
    var res = parseInt(cant)-1;
    var enviar = 0;
    var existe = false;
    //datos para guardar cookies
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    //capturas de ids contenidos en la cookies con la clave id
    var id_values = document.cookie.replace(/(?:(?:^|.*;\s*)nomegusta\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    var captura_id = id_values.split(",");
    
    for (var i in captura_id) {
        if(captura_id[i] == id_prod){
            existe = true;
        }    
    }
    var seleccion;
    var entrada = 1;
    if (existe == true) {
        for (var i in captura_id) {
            if(entrada == 1 && captura_id[i] != id_prod && captura_id[i] != 'undefined'){
                seleccion = captura_id[i];
                entrada=0;
            }
            else if(captura_id[i] != id_prod && captura_id[i] != 'undefined'){
                seleccion = seleccion+","+captura_id[i];
            }
        }
        document.cookie = "nomegusta=" + seleccion + ";" + expires + ";path=/"
        $(e).attr("data", res);
        enviar=res;
        $(e).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>('+ res +')');
        alertify.success('<i style="color: #FFFFFF;">Haz eliminado tu no me gusta</i>');
    }else{
        if (id_values == '' || id_values == 'undefined') {
            var guardar_id = id_prod;
            document.cookie = "nomegusta=" + guardar_id + ";" + expires + ";path=/";
            $(e).attr("data", sum);
            enviar=sum;
            $(e).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>('+ sum +')');
            alertify.error('<i style="color: #FFFFFF;">Este producto no te gusta</i>');
        }else{
            var guardar_id = id_values+","+id_prod;
            document.cookie = "nomegusta=" + guardar_id + ";" + expires + ";path=/";
            $(e).attr("data", sum);
            enviar=sum;
            $(e).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>('+ sum +')');
            alertify.error('<i style="color: #FFFFFF;">Este producto no te gusta</i>');
        } 
    }
    var formData = {
        cantidad: enviar,
    }
    type = "POST"; // para actualizar recursos existentes
    my_url = 'editnomegusta/' + id_prod;
    
    console.log(formData);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}