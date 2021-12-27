var resultadoArray;

function consultasSQL(pagina, accion, parametros){
    jQuery.ajaxSetup({async:false});

    $.ajax({
        url: pagina,
        type: "POST",
        data: {
            accion: accion,
            parametros: parametros
        },
        async: false,
        success: function (data) {
            resultadoArray = JSON.parse(data);
        }
    });
    return resultadoArray;

    jQuery.ajaxSetup({async:true, resultado : data});
}

function jsEncode(s, k){
    var enc = "";
    var str = "";
    // make sure that input is string
    str = s.toString();
    for (var i = 0; i < s.length; i++) {
        // create block
        var a = s.charCodeAt(i);
        // bitwise XOR
        var b = a ^ k;
        enc = enc + String.fromCharCode(b);
    }
    return enc;
}