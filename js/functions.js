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
});