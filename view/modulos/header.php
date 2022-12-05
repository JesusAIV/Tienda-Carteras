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
                    <input class="menu__input" type="checkbox" id="menu">
                    <a href="<?php echo SERVERURL ?>inicio"><img class="logo-img--header" src="<?php echo SERVERURL ?>img/png/bolso.png" alt="Logo"></a>
                    <a class="logo-enlace" href="<?php echo SERVERURL ?>inicio">
                        <h1>Confecciones Milagros</h1>
                    </a>
                </div>

                <div class="cuenta">
                    <?php
                    if (!isset($_SESSION['email'])) {
                    ?>
                        <a class="cuenta-iniciarSesion" href="<?php echo SERVERURL ?>cuenta">
                            <img class="cuenta__img" src="<?php echo SERVERURL ?>img/svg/user.svg" alt="user">
                        </a>
                    <?php
                    } else {
                    ?>
                        <a class="cuenta-iniciarSesion btn-exit" href="#">
                            <i class="fa-solid fa-power-off"></i>
                            <h2 class="cuenta__titulo">Cerrar Sesión</h2>
                        </a>
                    <?php
                    }
                    ?>
                </div>
    </section>

    <div class="fixed-header">
        <nav class="navbar navbar-center">
            <div class="navone navbar-container-grid">
                <div class="navbar-center-ul">
                    <ul class="navbar-center navbar-center--items">

                        <li class="nav-item">
                            <a href="tiendas" class="nav-link">TIENDAS</a>
                        </li>

                        <li class="nav-item">
                            <a href="quienessomos" class="nav-link">QUIENES SOMOS</a>
                        </li>

                        <li class="nav-item nav-item--show">
                            <a href="#" class="nav-link">CATEGORIAS
                                <img src="./img/svg/arrow-bottom.svg" alt="arrow icon" class="nav-arrow">
                            </a>
                            <ul class="nav-sublinks">
                                <?php
                                $centros =  $Admin->ListarCategorias();
                                foreach ($centros as $key) {
                                ?>
                                    <li class="nav-subitem">
                                        <a class="nav-sublink nav__sublink--iside" href="<?php echo SERVERURL . 'categoria/' . $key['categoria'] ?>"><?php echo $key['categoria'] ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                    </ul>


                </div>

                <div class="search">
                    <input class="search-input" type="text" name="buscarProducto" id="buscarProducto" placeholder="Buscar producto">
                    <button class="search-boton">
                        <img class="search-icon" src="<?php echo SERVERURL ?>img/svg/search.svg" alt="search" name="search" id="search">
                    </button>
                    <div id="resultados"></div>
                </div>

            </div>

            <div class="menu-hamburguer">
                <img src="./img/svg/menu.svg" class="menu-img">
            </div>
        </nav>
    </div>
</header>