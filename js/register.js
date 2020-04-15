function registrar() {
    var username = $('#username').val()
    var nombre = $('#user').val()
    var telefono = $('#telefono').val()
    var ciudad = $('#ciudad').val()
    var pass = $('#pass').val()
    var con_pass = $('#con-pass').val()
    if (pass != con_pass) {
        alert('Las contraseñas no son iguales')
    } else {
        $.ajax({
            type: "POST",
            url: "Controller/loginController.php",
            data: {
                tipo: "Registrar",
                correo: username,
                pass: pass,
                nombre: nombre,
                telefono: telefono,
                ciudad: ciudad

            },
            success: function(data) {
                var json = JSON.parse(data);
                if (json.status == 'ok') {
                    alert(json.mensaje)
                    location.href = 'index.php';

                } else {
                    // document.getElementById("flag").value = json.flag;
                    // grecaptcha.reset;
                    // grecaptcha.ready(function() {
                    //     grecaptcha.execute('6LdoJcQUAAAAAO_kBq4ipqngEoWb1kIdNdXMQeQW', {
                    //         action: 'login'
                    //     }).then(function(token) {
                    //         // console.log(token);
                    //         document.getElementById("token").value = token;
                    //     });
                    // })

                    alert(json.mensaje);

                }

            }
        });
    }
}


function login() {
    var username = $('#username').val()
    var pass = $('#pass').val()

    $.ajax({
        type: "POST",
        url: "Controller/loginController.php",
        data: {
            tipo: "Login",
            correo: username,
            pass: pass

        },
        success: function(data) {
            var json = JSON.parse(data);
            if (json.status == 'ok') {
                alert(json.mensaje)
                location.href = 'admin/index.php';

            } else {
                // document.getElementById("flag").value = json.flag;
                // grecaptcha.reset;
                // grecaptcha.ready(function() {
                //     grecaptcha.execute('6LdoJcQUAAAAAO_kBq4ipqngEoWb1kIdNdXMQeQW', {
                //         action: 'login'
                //     }).then(function(token) {
                //         // console.log(token);
                //         document.getElementById("token").value = token;
                //     });
                // })

                alert(json.mensaje);

            }

        }
    });

}