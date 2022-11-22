$(document).ready( function () {
    listarproductos();

    $("#new-producto").click(function () {
        $(".modal-registro-nuevo-fondo").show();
    });
    $(".modal-registro-nuevo-close").click(function () {
        $(".modal-registro-nuevo-fondo").hide();
    });
} );

function listarproductos(){
    $('#table-productos').DataTable({
        'ajax': {
            'url': "./ajax/productos.php",
            'dataSrc': '',
            'data': { action: 'listarproductos' },
            'method': 'POST'
        },
        'columns': [
            {'data': 'contador'},
            {'data': 'producto'},
            {'data': 'precio'},
            {'data': 'descripcion'},
            {'data': 'stock'},
            {'data': 'categoria'},
            {'data': 'color'},
            {'data': 'editar'},
            {'data': 'estado'}
        ],
    'language': {
            "url": "./js/datatable-es.json"
        },
        responsive: false
    });
}