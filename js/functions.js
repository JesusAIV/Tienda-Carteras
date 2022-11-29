$(document).ready(function () {
    $(".registro-cuenta").hide();
    $(".modulo-cuenta-iniciar").hide();

    $("#registrarse").click(function () {
        $(".login-cuenta").hide();
        $(".registro-cuenta").show();
        $(".modulo-cuenta-registrar").hide();
        $(".modulo-cuenta-iniciar").show();
    });
    $("#iniciarsesion").click(function () {
        $(".login-cuenta").show();
        $(".registro-cuenta").hide();
        $(".modulo-cuenta-registrar").show();
        $(".modulo-cuenta-iniciar").hide();
    });

    $('.btn-exit').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que desea cerrar sesion?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: '<i class="fa-solid fa-xmark"></i>',
            confirmButtonText: '<i class="fa-solid fa-check"></i>'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'ajax/logoutAjax.php'
            }
        })
    })

    $("#menu-bars").click(function () {
        if ($(".header-inventario").css("margin-left") == "240px" || $(".header-inventario").css("margin-left") == "210px") {
            $(".header-inventario").css("margin-left", "0");
            $(".main-inventario").css("margin-left", "0");
            $(".menu-lateral").hide();
        } else {
            $(".header-inventario").css("margin-left", "15em");
            $(".main-inventario").css("margin-left", "15em");
            $(".menu-lateral").show();
        }
    });
});

window.onscroll = function () {
    var y = window.scrollY;

    if (y > 0) {
        $('.fixed-header').css('top', '0');
    } else {
        $('.fixed-header').css('top', 'auto');
    }
}