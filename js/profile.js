listar()

function listar() {
    var id = document.getElementById("id").value

    if (id != 0) {
        $.ajax({
            type: "POST",
            url: "Controller/empresaController.php",
            data: {
                tipo: "Listar",
                id: id
            },
            success: function(data) {
                var json = JSON.parse(data);
                console.log(json)
                $("#nombre").text(json.nombre)
                $("#telefono").text(json.telefono)
                $("#correo").text(json.correo)
                $("#ciudad").text(json.ciudad)
                $("#direccion").text(json.direccion)
                $("#descripcion").text(json.descripcion)
                $("#instagram").attr('href', json.instagram)
                $("#facebook").attr('href', json.facebook)
                $("#twitter").attr('href', json.twitter)
                $("#whatsapp").attr('href', json.whatsapp)
                $("#foto").attr('src', json.ruta_foto)
            }
        });
    }

}