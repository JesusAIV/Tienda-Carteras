$(document).ready( function () {
    listarproductos();
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