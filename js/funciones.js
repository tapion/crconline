/*
 * Funcion para enviar una peticion ajax
 * @param {string} urlAction Url de la peticion
 * argumentos[1] = id del contenedor de la respuesta type (string) default divContenido
 * argumentos[2] = id del form para validacion de campos con parsley type (string)
 * argumentos[3] = subcargas type(array) pos 0 => urlAction(string) , pos 1 => id del contenedor de la respuesta type(string) , pos 2 => id form type(string)
 */
function enviarPeticionAjax(urlAction) {
    var contenedor;
    var dtsFormulario;
    var param3 = enviarPeticionAjax.arguments[3];

    if (enviarPeticionAjax.arguments.length > 1) {
        contenedor = enviarPeticionAjax.arguments[1];
        if (typeof enviarPeticionAjax.arguments[2] != "undefined") {
            if (!$("#" + enviarPeticionAjax.arguments[2]).parsley('validate')) {
                return;
            }
            dtsFormulario = $('#' + enviarPeticionAjax.arguments[2]).serialize();
        }
    } else {
        contenedor = 'divContenido';
        dtsFormulario = "";
    }

    //divProcesando(true);

    $.ajax({
        url: urlAction,
        type: 'POST',
        data: dtsFormulario,
        dataType: 'html',
        success: function(respuesta) {
            $('#' + contenedor).html(respuesta);
            if (typeof param3 != "undefined") {
                enviarPeticionAjax(param3[0], param3[1], param3[2]);
            }
            divProcesando(false);
        },
        error: function() {
            mensaje('Se ha presentado un error en el proceso!!');
            divProcesando(false);
        }
    });
}


function enviarPeticionAjaxJSON(urlAction, contenedor, dtsFormulario, arraysubcargas) {
    var param3 = arraysubcargas;
    if (enviarPeticionAjaxJSON.arguments.length > 1) {
        if (typeof dtsFormulario != "undefined") {
            if (!$("#" + dtsFormulario).parsley('validate')) {
                return;
            }
            dtsFormulario = $('#' + dtsFormulario).serialize();
        }
    } else {
        contenedor = 'divContenido';
        dtsFormulario = "";
    }

    divProcesando(true);

    $.ajax({
        url: urlAction,
        type: 'POST',
        data: dtsFormulario,
        dataType: 'HTML',
        success: function(respuesta) {
            try {
                var objJSON = jQuery.parseJSON(respuesta);
                mensaje(objJSON.ok + ' !!');
            } catch (ex) {
                $('#' + contenedor).html(respuesta);
                if (typeof arraysubcargas != "undefined") {
                    enviarPeticionAjaxJSON(param3[0], param3[1], param3[2]);
                }
            }
            divProcesando(false);
        },
        error: function() {
            mensaje('Se ha presentado un error en el proceso!!');
            divProcesando(false);
        }
    });
}

/*
 * Muestra div procesando en toda la pantalla
 * @param {boolean} estado True/false si muestrar o ocultar div
 */
function divProcesando(estado) {
    if (estado) {
        $(".cartprocess").fadeTo(30, 0.40);
    } else {
        $(".cartprocess").hide();
    }
}

/*
 * Dar formato a una tabla, agrega paginacion y filtro en los resultados
 */
function formatoTablaResultados() {

    $('.datatable').dataTable({
        "sPaginationType": "bs_normal"
    });
    $('.datatable').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Buscar en resultados');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });

}
function formatoTablaResultados2(url) {
//    console.log(url);
    $('.datatable').dataTable({
        "sPaginationType": "bs_normal",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": url,
        "sServerMethod": 'POST',
        "aoColumnDefs": [
            {
                "bSearchable": false
//                ,"aTargets": [4, 8, 10, 11]
                ,"aTargets": []
            }
        ]
    });
    $('.datatable').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Buscar en resultados');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });

}

/*
 * Muestra un mensaje con bootox
 * @param {string} txtMensaje Texto a mostrar
 */
function mensaje(txtMensaje) {
    bootbox.alert(txtMensaje, function() {
    });
}

function confirmar(txtMensaje, accion) {
    bootbox.confirm(txtMensaje, function(result) {
        if (result) {
            mensaje('si lo es');
            return true;
        } else {
            mensaje('noo .. es una loca.');
        }
    });
    return false;
}

function marcaciones(marcar) {
    if (marcar == true) {
        $('input[type=checkbox]').prop('checked', true);
        $('#marcar').html('&nbsp;Desmarcar Todos');
        $('#btnselect').attr('onclick', 'marcaciones();');
    } else {
        $('input[type=checkbox]').prop('checked', false);
        $('#marcar').html('&nbsp;Marcar Todos');
        $('#btnselect').attr('onclick', 'marcaciones(true);');
    }
}

function deshabilitarcampos(contenedor, form, array) {
    var exito = true;
    if (typeof form != "undefined") {
        if (!$("#" + form).parsley('validate')) {
            exito = false;
        }
    }
    if (exito) {
        for (i = 0; i < array.length; i++) {
            $("#" + contenedor + " " + array[i]).each(function(index) {
                var ident = $(this).attr("id");
                if (array[i] === 'select') {
                    $("#" + ident + "_chzn").removeClass("chzn-with-drop chzn-container-active").addClass("chzn-container chzn-container-single chzn-disabled");
                } else {
                    $("#" + ident).attr("disabled", "disabled");
                }
            });
        }
    }
}

function habilitarDeshabilitarOpc(divpadre, idactivar){
    $('#'+divpadre + ' li').removeClass('active');
    $('#'+idactivar).addClass('active');
}
