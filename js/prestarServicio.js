/* 
 * @autor Jerson Stivel Gomez Urrego
 */
$(function() {
    $('.chzn-select').chosen();
});

function enviarAjax(rut, form, divRespuesta, action) {
    $('#'+divRespuesta).html();
    var str = $('#' + form).serialize();
    var url = rut;
    $.ajax({
        url: url,
        type: 'POST',
        data: str + '&form=' + form + '&rut=' + rut + '&accion='+action,
        async: true,
        dataType: "html", //xml,html,script,json
        success: function(result) {
            $('#'+divRespuesta).html(result);
        },
        error: function(result) {
            mensaje('Error ejecutando el proceso!! ');
        },
//        statusCode: {
//            404: function() {
//                mensaje('No se encontro el archivo requerido!!');
//            }
//        },
        timeout: 10000
    });
}
