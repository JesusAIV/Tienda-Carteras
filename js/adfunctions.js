$(document).ready(function () {
    listarproductos();
    modalNew();
    crudProducto();
    validarPrecio();
    previsualizarImagen();
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
            { 'data': 'imagen' },
            { 'data': 'editar' },
            { 'data': 'estado' }
        ],
        'language': {
            "url": "./js/datatable-es.json"
        },
        responsive: false
    });
}
function modalNew() {
    $("#update-producto").click(function () {
        $("#productoupdate").show();
    });
    $(".modal-registro-nuevo-close").click(function () {
        $("#productoupdate").hide();
    });
    
    $("#new-producto").click(function () {
        $("#productonuevo").show();
    });
    $(".modal-registro-nuevo-close").click(function () {
        $("#productonuevo").hide();
    });

    $("#new-color").click(function () {
        $("#colornew").show();
    });
    $(".modal-registro-nuevo-close").click(function () {
        $("#colornew").hide();
    });

    $("#new-categoria").click(function () {
        $("#categorianew").show();
    });
    $(".modal-registro-nuevo-close").click(function () {
        $("#categorianew").hide();
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
function validarPrecio() {
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
}

var averagediv = document.getElementById('averagecolor'), averageimage = document.getElementById('addpimagencolor'), labelcolor = document.getElementById('averagecolorlabel');

function getaverageColor(imagen) {
    var r = 0, g = 0, b = 0, count = 0, canvas, ctx, imageData, data, i;
    canvas = document.createElement('canvas');
    ctx = canvas.getContext("2d");
    canvas.width = imagen.width;
    canvas.height = imagen.height;
    ctx.drawImage(imagen, 0, 0);
    imageData = ctx.getImageData(0, 0, imagen.width, imagen.height);
    data = imageData.data;
    for (i = 0, n = data.length; i < n; i += 4) {
        ++count;
        r += data[i];
        g += data[i + 1];
        b += data[i + 2];
    }
    r = ~~(r / count);
    g = ~~(g / count);
    b = ~~(b / count);
    return [r, g, b];
}

function rgbToHex(arr) {
    return "#" + ((1 << 24) + (arr[0] << 16) + (arr[1] << 8) + arr[2]).toString(16).slice(1);
}

function uploadImage(e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
        switchImage(this);
    }
}
function switchImage(image) {
    var averagecolor = getaverageColor(image);
    var color = rgbToHex(averagecolor);
    averagediv.style.backgroundColor = averagediv.value = color;
}

function previsualizarImagen() {
    $("#addpimagencategoria").change(function () {
        var img = this.files[0];

        if (img["type"] != "image/jpeg" && img["type"] != "image/png") {

            $("#addpimagencategoria").val("");
            alert("Error al subir la imagen, La imagen debe estar en formato JPG o PNG");

        } else if (Number(img["size"]) > 2000000) {
            $("#addpimagencategoria").val("");
            alert("Error al subir la imagen, La imagen no debe pesar más de 2 MB!");


        } else {

            var imagen = new FileReader;
            console.log("imagen ", imagen);
            imagen.readAsDataURL(img);

            $(imagen).on("load", function (event) {

                var rutaImagen = event.target.result;
                $("#addpimagencategoriaimg").attr("src", rutaImagen);

            })

        }

    })
}

function RegritroCategorias(filtro, categoria, npagina){
    $.ajax({
        url: 'http://localhost:8085/Tienda-Carteras/ajax/productos.php',
        type: 'POST',
        dataType: 'html',
        data: { filtro : filtro, action : 'filtrocategoria', dcategoria: categoria, numpagina: npagina},
    })
    .done(function(resultado){
        $('#container__products').html(resultado);
    })
}
$(document).on('change', '#ordenar', function(){
    var valorfiltro = $(this).val();
    var categoria = $('#categoria').val();
    var pagina = $('#npagina').val();
    if (valorfiltro != ""){
        RegritroCategorias(valorfiltro, categoria, pagina);
    }else{
        RegritroCategorias();
    }
});

document.getElementById("addpimagencolorinput").addEventListener("change", function (e) {
    file = e.target.files[0];
    if (!file.type.match(/image.*/)) return;
    var reader = new FileReader();
    reader.onload = uploadImage;
    reader.readAsDataURL(file);
});
