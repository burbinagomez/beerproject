function init() {
    gapi.load('auth2', function() {
        /* Ready. Make a call to gapi.auth2.init or some other API */
    });
}

function onSignIn(googleUser) {
    var aux = localStorage.getItem("salir")
    if (aux == "1") {
        init();
        signOut();
        localStorage.clear();
    } else {
        var profile = googleUser.getBasicProfile();
        var tipo = "loginGmail";
        var name = profile.getName();
        var email = profile.getEmail()
        var image = profile.getImageUrl();
        $.ajax({
            type: "POST",
            url: "Controller/loginController.php",
            data: {
                tipo: tipo,
                name: name,
                email: email,
                image: image
            },
            success: function(data) {
                console.info(data);
                var json = JSON.parse(data);
                if (json.status == 'ok') {
                    location.href = 'index.php';
                } else {

                    alert(json.mensaje);
                }

            }
        });

    }

}


function salir() {
    var flag = signOut();
    var tipo = "Cerrar";
    $.ajax({
        type: "POST",
        url: "Controller/loginController.php",
        data: {
            tipo: tipo
        },
        success: function(data) {
            var json = JSON.parse(data);
            localStorage.setItem("salir", json.confirmar);
            window.location = "index.php";
        }
    });


}

function signOut() {
    try {
        const googleAuth = gapi.auth2.getAuthInstance();
        googleAuth.signOut().then(function() {

        });

        return true;
    } catch (error) {
        return false;
    }
}



var Utils = {
    ///Messages
    _BuilderMessage: function(type, message) {
        console.log("_BuilderMessage");

        var title = "";
        var typeAlert = "";
        var clase = "";
        switch (type) {
            case 'error':
                title = 'Error';
                typeAlert = 'error';
                break;
            case 'success':
                title = 'Correcto';
                typeAlert = 'success';
                clase = " alert-success";
                break;
            case 'warning':
                title = 'Advertencia';
                typeAlert = 'warning';
                clase = ' alert-warning';
                break;
            default:
                break;
        }
        $("#alert_response").addClass(clase);
        $("#alert_response").show();
        $("#Mensaje_Alert").text(message);

        window.setTimeout(function() {
            $("#alert_response").hide();
            $("#alert_response").removeClass(clase);
        }, 2000);


    },


}


var RequestHttp = {
    _ValidateResponse: function(response) {
        var result = null;

        if (response.status == 200) {
            result = JSON.parse(response.responseText);
        } else {
            if (response.status == 0)
                Utils._BuilderMessage("danger", "No pudo conectarse con el servidor.</br>Por favor, revise su conexión a internet o comuníquese con el administrador.");
            else
                Utils._BuilderMessage("danger", response.status + ": " + response.statusText);
        }
        return result;
    },
    _UploadFile: function(e, url, callback) {
        console.log("RequestHttp._UploadFile");

        var files = $(e).prop("files");

        var data = new FormData();
        $.each(files, function(key, value) {
            data.append("file", value);
            data.append("tipo", "upload");
        });

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            complete: function(jqXHR, textStatus) {
                var resultado = RequestHttp._ValidateResponse(jqXHR);

                if (resultado != null) {
                    if (resultado.state == true)
                        callback(resultado.data);
                    else
                    // Utils._BuilderMessage('danger', resultado.message);
                    if (resultado.message != null) {
                        alert(resultado.message);
                    }

                }
                callback(null);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var $loading = $('#container-loading').hide();
                // Utils._BuilderMessage("danger", textStatus);
                alert("Error por tamaño o formato no permitido");
                $loading.stop().fadeOut(100);
            }
        });
    }
}