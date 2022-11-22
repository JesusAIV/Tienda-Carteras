$(document).ready(function () {
    listarproductos();
    modalNewProducto();
    crudProducto();
});

function listarproductos() {
    $('#table-productos').DataTable({
        'ajax': {
            'url': "./ajax/productos.php",
            'dataSrc': '',
            'data': { action: 'listarproductos' },
            'method': 'POST'
        },
        'columns': [
            { 'data': 'contador' },
            { 'data': 'producto' },
            { 'data': 'precio' },
            { 'data': 'descripcion' },
            { 'data': 'stock' },
            { 'data': 'categoria' },
            { 'data': 'color' },
            { 'data': 'editar' },
            { 'data': 'estado' }
        ],
        'language': {
            "url": "./js/datatable-es.json"
        },
        responsive: false
    });
}
function modalNewProducto() {
    $("#new-producto").click(function () {
        $(".modal-registro-nuevo-fondo").show();
    });
    $(".modal-registro-nuevo-close").click(function () {
        $(".modal-registro-nuevo-fondo").hide();
    });
}
function crudProducto() {
    $('.ProductosAjax').submit(function (e) {
        e.preventDefault();

        var form = $(this);

        var tipo = form.attr('data-form');
        var accion = form.attr('action');
        var metodo = form.attr('method');
        var respuesta = form.children('.RespuestaAjax');

        var msjError = "<script>Swal.fire('Ocurrio un error inesperado', 'Error', 'error');</script>";
        var formdata = new FormData(this);

        var textoAlerta;
        if (tipo === "add-producto") {
            textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
        } else if (tipo == "delete") {
            textoAlerta = "Los datos serán eliminados completamente del sistema";
        } else if (tipo === "update") {
            textoAlerta = "Los datos del sistema serán actualizados";
        } else if (tipo === "generate") {
            textoAlerta = "Se va a generar un nuevo usuario";
        } else if (tipo === "disabled") {
            textoAlerta = "El usuario será desabilitado del sistema";
        } else if (tipo === "enable") {
            textoAlerta = "El usuario será habilitado del sistema";
        } else if (tipo === "update-perfil") {
            textoAlerta = "Los datos del sistema serán actualizados";
        } else {
            textoAlerta = "Quieres realizar la operación solicitada"
        }

        Swal.fire({
            title: '¿Estás seguro?',
            text: textoAlerta,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: metodo,
                    url: accion,
                    data: formdata ? formdata : form.serialize(),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        respuesta.html(data);
                        form[0].reset();
                    },
                    error: function () {
                        respuesta.html(msjError);
                    }
                });
                return false;
            }
        })
    });
}
$(document).on('keydown', 'input[pattern]', function (e) {
    var input = $('#addpprecio');
    var oldVal = input.val();
    var regex = new RegExp(input.attr('pattern'), 'g');

    setTimeout(function () {
        var newVal = input.val();
        if (!regex.test(newVal)) {
            input.val(oldVal);
        }
    }, 1);
});