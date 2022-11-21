$(document).ready( function () {
    $('#table-productos').DataTable({
        // responsive: {
        //     details: false
        // },
        "language": {
            "url": "./js/datatable-es.json"
        }
    });
} );