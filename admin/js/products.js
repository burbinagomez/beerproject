function listar() {

}

function crear() {
    var producto = $("#producto").val()
    var precio = $("#precio").val()
    var stock = $("#stock").val()
    $.ajax({
        type: "POST",
        url: "Controller/loginController.php",
        data: {
            tipo: "Crear",
            producto: producto,
            precio: precio,
            stock: stock,
            foto: ""


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

function editar() {

}

function eliminar() {

}