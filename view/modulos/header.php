<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();
?>
<!-- Header -->
<header>
    <!-- Horario de Atención -->
    <section class="horario">
        <div class="content">
            <p class="txt">
                Horario de atención - Lunes a Sábado de 6:00 AM a 1:00 PM
            </p>
            <a class="txt txt--cell" href="https://api.whatsapp.com/send?phone=+51939304773&text=Hola, me gustaría comprar tu producto!" target="_blank"">
                +51 939 304 773
            </a>
        </div>
    </section>

    <!-- Logo/Inicar sesion/Bolsa -->
    <section class=" container container__login">
                <div class="logo">
                    <label for="menu">
                        <img class="menu__img" src="<?php echo SERVERURL ?>img/svg/menu.svg" alt="menu__icon">
                    </label>
                    <input class="menu__input" type="checkbox" id="menu">
                    <a href="<?php echo SERVERURL ?>inicio"><img class="logo-img--header" src="<?php echo SERVERURL ?>img/png/bolso.png" alt="Logo"></a>
                    <a class="logo-enlace" href="<?php echo SERVERURL ?>inicio">Confecciones Milagros</a>
                </div>

                <div class="cuenta">
                    <?php
                    if (!isset($_SESSION['email'])) {
                    ?>
                        <a class="cuenta-iniciarSesion" href="<?php echo SERVERURL ?>cuenta">
                            <h2 class="cuenta__titulo">Iniciar sesion / Registrarse</h2>
                            <img class="cuenta__img" src="<?php echo SERVERURL ?>img/svg/user.svg" alt="user">
                        </a>
                    <?php
                    } else {
                    ?>
                        <a class="cuenta-iniciarSesion btn-exit" href="">
                            <i class="fa-solid fa-power-off"></i>
                            <h2 class="cuenta__titulo">Cerrar Sesión</h2>
                        </a>
                    <?php
                    }
                    ?>
                </div>

                <!-- LA PARTE DE BOLSA LO COMENTO A RAZÓN DE QUE NO SE VA A VENDER NADA PORA LA WEB -->

                <!-- <div class="bolsa">
                    <div class="icon-container">
                        <a class="icon-enlace" href="">
                            <img class="icon-img" src="./img/svg/bag.svg" alt="bolsa">
                            <p class="icon-texto">bolsa</p>
                        </a>
                    </div>
                    <div class="precio-container">
                        <a class="precio-enlace" href="#">
                            <p class="precio-texto">s/000.00</p>
                            <p class="precio-texto">0 productos</p>
                        </a>
                    </div>
                </div> -->

    </section>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-center">
        <div class="navbar-container-grid">
            <div class="navbar-center-ul">
                <ul class="navbar-center">
                    <?php
                        $centros =  $Admin->ListarCategorias();
                        foreach ($centros as $key) {
                            ?>
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL.'categoria/'.$key['categoria'] ?>"><?php echo $key['categoria'] ?></a>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="search">
                <input class="search-input" type="text" name="buscarProducto" id="buscarProducto" placeholder="Buscar producto">
                <button class="search-boton">
                    <img class="search-icon" src="<?php echo SERVERURL ?>img/svg/search.svg" alt="search" name="buscar" id="buscar">
                </button>
            </div>
        </div>
            
    </nav>
</header>