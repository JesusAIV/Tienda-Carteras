<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();

    $pagina = explode("/", $_GET['views']);

    $categoria = $pagina[1];
?>
<div class="principal">
        <!-- <div class="banner">
            <img src="./img/jpg/banner-carteras.jpg" alt="banner-carteras" class="banner__img">
        </div> -->

        <div class="content__carteras">
            <div class="caja1">
                <h2 class="caja1__title">CARTERAS</h2>

                <div class="categorias">
                    <h3 class="categorias__title">Categorias</h3>
                    <div class="categorias__links">
                        <?php
                            $centros =  $Admin->ListarCategorias();
                            foreach ($centros as $key) {
                                ?>
                                <a href="<?php echo SERVERURL.'categoria/'.$key['categoria'] ?>" class="categorias__link"><?php echo $key['categoria'] ?></a>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="color">
                    <h3 class="color__title">Filtrar por color</h3>
                    <div class="color__container">
                        <ul class="color__items">
                            <?php
                                $centros =  $Admin->ListarColores();
                                foreach ($centros as $key) {
                                    ?>
                                        <li class="color__item">
                                            <a href="#" class="color__select" id="<?php echo $key['codigohex']?>">
                                                <span class="color__filter amarillo" style="background-color: #<?php echo $key['codigohex']?> ;"></span>
                                            </a>
                                        </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="caja2">
                <div class="menu">
                    <div class="menu__navegacion">
                        <a href="inicio" class="menu__navegacion__link">incio</a>
                        <span class="menu__navegacion__name"><?php echo $categoria; ?></span>
                    </div>

                    <div class="mostrar">
                        <form class="ordenar" method="POST">
                            <label class="ordenar__label" for="">Ordenar por: </label>
                            <select class="ordenar__select" name="ordenar" id="ordenar">
                                <option value="" class="ordenar__option">Orden por bajo precio</option>
                                <option value="" class="ordenar__option">Orden por alto precio</option>
                                <option value="" class="ordenar__option">Orden por defecto</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="container__products">
                    <?php
                        $centros =  $Admin->DatosCategoria($categoria);
                        foreach ($centros as $key) {
                        ?>
                        <div class="card__product">
                            <picture class="product">
                                <a href="<?php echo SERVERURL ?>productoDetalle/<?php echo $key['producto']?>" class="product__item">
                                    <img src="<?php echo SERVERURL ?>img/png/cartera_view1.png" alt="" class="product__show">
                                </a>
                            </picture>
                            <h3 class="product__title"><?php echo $key['producto']?></h3>
                            <span class="product__price"><?php echo $key['precio']?></span>
                            <a href="<?php echo SERVERURL ?>productoDetalle/<?php echo $key['producto']?>" class="product__ver button">
                                <span class="button__span"></span>
                                <span class="button__span"></span>
                                <span class="button__span"></span>
                                <span class="button__span"></span>
                                Ver producto
                            </a>
                        </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>