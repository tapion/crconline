window.ParsleyConfig = window.ParsleyConfig || {};

(function($) {
    window.ParsleyConfig = $.extend(true, {}, window.ParsleyConfig, {
        messages: {
            // parsley //////////////////////////////////////
            defaultMessage: "Este valor parece ser inv&aacute;lido."
                    , type: {
                email: "Este valor debe ser un correo v&aacute;lido."
                        , url: "Este valor debe ser una URL v&aacute;lida."
                        , urlstrict: "Este valor debe ser una URL v&aacute;lida."
                        , number: "Este valor debe ser un n&uacute;mero v&aacute;lido."
                        , digits: "Este valor debe ser un d&iacute;gito v&aacute;lido."
                        , dateIso: "Este valor debe ser una fecha v&aacute;lida (YYYY-MM-DD)."
                        , alphanum: "Este valor debe ser alfanum&eacute;rico."
                        , phone: "Este valor debe ser un n&uacute;mero telef&oacute;nico v&aacute;lido."
            }
            , notnull: "Este valor no debe ser nulo."
                    , notblank: "Este valor no debe estar en blanco."
                    , required: "El campo <b>%s</b> es requerido."
                    , regexp: "Este valor es incorrecto."
                    , min: "Este valor no debe ser menor que %s."
                    , max: "Este valor no debe ser mayor que %s."
                    , range: "Este valor debe estar entre %s y %s."
                    , minlength: "Este valor es muy corto. La longitud m&iacute;nima es de %s caracteres."
                    , maxlength: "Este valor es muy largo. La longitud m&aacute;xima es de %s caracteres."
                    , rangelength: "La longitud de este valor debe estar entre %s y %s caracteres."
                    , mincheck: "Debe seleccionar al menos %s opciones."
                    , maxcheck: "Debe seleccionar %s opciones o menos."
                    , rangecheck: "Debe seleccionar entre %s y %s opciones."
                    , equalto: "Este valor debe ser id&eacute;ntico."

                    // parsley.extend ///////////////////////////////
                    , minwords: "Este valor debe tener al menos %s palabras."
                    , maxwords: "Este valor no debe exceder las %s palabras."
                    , rangewords: "Este valor debe tener entre %s y %s palabras."
                    , greaterthan: "Este valor no debe ser mayor que %s."
                    , lessthan: "Este valor no debe ser menor que %s."
                    , beforedate: "Esta fecha debe ser anterior a %s."
                    , afterdate: "Esta fecha debe ser posterior a %s."
                    , americandate: "Este valor debe ser una fecha v&aacute;lida (MM/DD/YYYY)."
        }
    });
}(window.jQuery || window.Zepto));
