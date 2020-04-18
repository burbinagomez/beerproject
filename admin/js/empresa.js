listar()

function listar() {
    var id = document.getElementById("id_empresa").value

    if (id != 0) {
        $.ajax({
            type: "POST",
            url: "../Controller/empresaController.php",
            data: {
                tipo: "Listar",
                id: id
            },
            success: function(data) {
                var json = JSON.parse(data);
                console.log(json)
                $("#nombre").val(json.nombre)
                $("#telefono").val(json.telefono)
                $("#correo").val(json.correo)
                $("#ciudad").val(json.ciudad)
                $("#direccion").val(json.direccion)
                $("#descripcion").val(json.descripcion)
                $("#instagram").val(json.instagram)
                $("#facebook").val(json.facebook)
                $("#twitter").val(json.twitter)
                $("#whatsapp").val(json.whatsapp)
                $("#foto").attr('src', json.ruta_foto)
            }
        });
    }

}

function actualizar() {
    var id = document.getElementById("id_empresa").value
    var nombre = $("#nombre").val()
    var telefono = $("#telefono").val()
    var correo = $("#correo").val()
    var ciudad = $("#ciudad").val()
    var direccion = $("#direccion").val()
    var descripcion = $("#descripcion").val()
    var instagram = $("#instagram").val()
    var facebook = $("#facebook").val()
    var twitter = $("#twitter").val()
    var whatsapp = $("#whatsapp").val()
    if (id != 0) {
        $.ajax({
            type: "POST",
            url: "../Controller/empresaController.php",
            data: {
                tipo: "Actualizar",
                id: id,
                nombre: nombre,
                telefono: telefono,
                correo: correo,
                ciudad: ciudad,
                direccion: direccion,
                descripcion: descripcion,
                instagram: instagram,
                facebook: facebook,
                twitter: twitter,
                whatsapp: whatsapp,
                cambio_img: FILE_PHOTO.Change,
                nombre_imagen: FILE_PHOTO.Name,
                foto: FILE_PHOTO.Path,
            },
            success: function(data) {
                var json = JSON.parse(data);
                if (json.status == 'ok') {
                    alert(json.mensaje)
                    location.href = 'admin/empresa.php';

                } else {
                    alert(json.mensaje);

                }

            }
        });
    }
}

function UploadPhoto(e) {
    var formato = (e.files[0].type);
    /*
    if (formato != "application/pdf") {
        alert("Formato no válido, por favor ingrese un formato valido (PDF)");
        e.value = "";
        return false;
    }
    */
    var tam = (e.files[0].size);
    if (2150000 < tam) {
        alert("El archivo supera el tamaño permitido(2 MB)");
        e.value = "";
        return false;
    }
    RequestHttp._UploadFile(e, "../Controller/empresaController.php", function(data) {

        if (data != null) {
            FILE_PHOTO = {
                'Path': data.Path,
                'Name': data.Name,
                'Change': 1
            };
            CambiarImagen(data.Path);
        }
    });
}


function CambiarImagen(Path) {
    $('#foto').attr('src', Path);
}