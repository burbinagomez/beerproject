listar()

function listar() {
    $.ajax({
        type: "POST",
        url: "Controller/cerveceriasController.php",
        data: {
            tipo: "Listar",
        },
        success: function(data) {
            var json = JSON.parse(data);
            var html = ""
            var tamano = json.datos.length;
            for (var i = 0; i < tamano; i++) {
                html = html + '<div class="p-item web-design"><a href="profile.php?id=' + json.datos[i].id + '" data-fluidbox><img src="' + json.datos[i].ruta_foto + '" alt=""></a></div>'
            }
            $("#cervecerias").html(html);
        }
    });
}