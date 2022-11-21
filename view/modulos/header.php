<!-- Header -->
<header>
    <!-- Horario de Atención -->
    <section class="horario">
        <div class="content">
            <p class="txt">
                Horario de atención - Lunes a Sábado de 6:00 AM a 1:00 PM
            </p>
            <p class="txt">
                +51 939 304 773
            </p>
        </div>
    </section>

    <!-- Logo/Inicar sesion/Bolsa -->
    <section class="container">
        <div class="logo">
            <img class="logo-img--header" src="img/png/bolso.png" alt="Logo">
            <a class="logo-enlace" href="inicio">Confecciones Milagros</a>
        </div>

        <div class="cuenta">
            <?php
                if(!isset($_SESSION['email'])){
                    ?>
                        <a class="cuenta-iniciarSesion" href="cuenta">
                            <h2 class="cuenta__titulo">Iniciar sesion / Registrarse</h2>
                            <img class="cuenta__img" src="./img/svg/user.svg" alt="user">
                        </a>
                    <?php
                    }else{
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

    <hr class="division">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-center">
        <div>
            <ul class="navbar-center">
                <li class="nav-item"><a href="carteras">CARTERAS</a></li>
                <li class="nav-item"><a href="">BOLSOS</a></li>
                <li class="nav-item"><a href="">MOCHILAS</a></li>
                <li class="nav-item"><a href="">MORRALES</a></li>
            </ul>
        </div>
        
        <div class="search">
            <input class="search-input" type="text" name="buscarProducto" id="buscarProducto" placeholder="Buscar producto">
            <button class="search-boton">
                <img class="search-icon" src="./img/svg/search.svg" alt="search" name="buscar" id="buscar">
            </button>
        </div>
    </nav>
</header>