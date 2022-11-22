<?php
if (!isset($_SESSION['email'])) :
?>
    <div class="micuenta">
        <div class="cuenta-header">
            <div class="cuenta-header-title">
                <p>Mi Cuenta</p>
            </div>
            <div class="cuenta-header-subtitle">
                <a class="cuenta__link" href="inicio">casa</a>
                <span class="cuenta__section">mi cuenta</span>
            </div>
        </div>
        <div class="content-cuenta">
            <div class="form-cuenta">
                <div class="login-cuenta">
                    <div class="login-container">
                        <div class="login-header header-cuenta">
                            <p class="cuenta__leyend">Iniciar Sesión</p>
                            <hr>
                        </div>
                        <div>
                            <div class="cuenta-paragraph">
                                <p>Por favor complete el formulario con su correo electrónico y contraseña</p>
                            </div>
                            <form class="" action="" method="POST">
                                <div class="campos-form">
                                    <div class="campos-placeholder">
                                        <input type="email" name="email" id="email" required>
                                        <label for="email">Correo electrónico</label>
                                    </div>
                                    <div class="campos-placeholder">
                                        <input type="password" name="password" id="password" required>
                                        <label for="password">Contraseña</label>
                                    </div>
                                    <div class="button-form btn1">
                                        <button type="submit" name="iniciarsesion">Iniciar sesión</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="registro-cuenta">
                    <div class="registro-container">
                        <div class="registro-header header-cuenta">
                            <p class="cuenta__leyend">Registrar cliente</p>
                            <hr>
                        </div>
                        <div>
                            <div>
                                <p>Por favor complete el formulario y le crearemos una nueva cuenta en un abrir y cerrar de ojos</p>
                            </div>
                            <div class="campos-form">
                                <div class="campos-placeholder">
                                    <input type="text" id="nombre" name="nombre" required>
                                    <label for="nombre">Nombres</label>
                                </div>
                                <div class="campos-placeholder">
                                    <input type="text" name="apellidos" id="apellidos" required>
                                    <label for="apellidos">Apellidos</label>
                                </div>
                                <div class="campos-placeholder">
                                    <input type="text" name="email" id="email" required>
                                    <label for="email">Correo electrónico</label>
                                </div>
                                <div class="campos-placeholder">
                                    <input type="password" name="password" id="password" re<input type="text" name="apellidos" id="apellidos" required>
                                    <label for="password">Contraseña</label>
                                </div>
                                <div class="button-form btn2">
                                    <button type="submit">Registrarse</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modulo-cuenta-registrar">
                <div class="modulo-cuenta-content">
                    <div class="header-cuenta-modulo header-cuenta">
                        <p class="cuenta__leyend">Crear nueva cuenta</p>
                        <hr>
                    </div>
                    <div class="modulo-parrafo">
                        <p>Registrarse en este sitio le permite acceder al estado e historial de su pedido. Solo te pediremos la información necesaria para que el proceso de compra sea más rápido y sencillo.</p>
                    </div>
                    <div class="button-modulo">
                        <button class="button" id="registrarse">
                            <span class="button__span"></span>
                            <span class="button__span"></span>
                            <span class="button__span"></span>
                            <span class="button__span"></span>
                            Registrarse
                        </button>
                    </div>
                </div>
            </div>
            <div class="modulo-cuenta-iniciar">
                <div class="modulo-cuenta-content">
                    <div class="header-cuenta-modulo header-cuenta">
                        <p class="cuenta__leyend">Iniciar sesión</p>
                        <hr>
                    </div>
                    <div class="modulo-parrafo">
                        <p>Inicia sesión con tu cuenta ya existente y sigue disfrutando de tus compras</p>
                    </div>
                    <div class="button-modulo">
                        <button class="button" id="iniciarsesion">
                            <span class="button__span"></span>
                            <span class="button__span"></span>
                            <span class="button__span"></span>
                            <span class="button__span"></span>
                            Iniciar sesión</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
else :
    echo "
        <script>
            window.location.href='inicio'
        </script>";
endif;
?>
<?php
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['iniciarsesion'])) {
    require_once "./controller/logincontroller.php";
    $login = new logincontrolador();
    echo $login->iniciar_sesion_controlador();
}
?>