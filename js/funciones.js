/*
 * Funcion para enviar una peticion ajax
 * @param {string} urlAction Url de la peticion
 */
function enviarPeticionAjax( urlAction ){
    
    if( enviarPeticionAjax.arguments.length > 1 ){
        contenedor = enviarPeticionAjax.arguments[1];
    }else{
        contenedor = 'divContenido';
    }
    
    divProcesando(true);
    
    $.ajax({
           url: urlAction,
            type:'POST',
            //dataType: 'json',
            success: function(respuesta){
                $('#'+contenedor).html(respuesta);
                divProcesando(false);
            },
            error:function(){
                mensaje('Se ha presentado un error al llamar Ajax!...');
                divProcesando(false);
            }        
            });
            
    
}

/*
 * Muestra div procesando en toda la pantalla
 * @param {boolean} estado True/false si muestrar o ocultar div
 */
function divProcesando(estado){
    if( estado ){
        $(".cartprocess").fadeTo(30, 0.40);
    }else{
        $(".cartprocess").hide();
    }
}

/*
 * Muestra un mensaje con bootox
 * @param {string} txtMensaje Texto a mostrar
 */
function mensaje( txtMensaje ){
    bootbox.alert( txtMensaje, function() {
    });
}

function confirmar( txtMensaje, accion ){
    bootbox.confirm( txtMensaje , function(result) {
        if (result) {
            mensaje('si lo es');
            return true;
        } else {
            mensaje('noo .. es una loca.');
        }
    }); 
    return false;
}

