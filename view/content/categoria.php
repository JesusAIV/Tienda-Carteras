<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();

    $pagina = explode("/", $_GET['views']);

    $categoria = $pagina[1];

    if(empty($pagina[2])){
        $npagina = 1;
    }else{
        $npagina = $pagina[2];
    }

?>
<div class="principal">
        <input type="hidden" name="categoria" value="<?php echo $categoria; ?>" id="categoria">
        <input type="hidden" name="npagina" value="<?php echo $npagina; ?>" id="npagina">
        <div class="content__carteras">
            <div class="carteras__menu">
                <img src="<?php echo SERVERURL ?>view/img/svg/menu.svg" alt="menu" class="carteras__menu__img">
            </div>
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
                        <a href="<?php echo SERVERURL ?>inicio" class="menu__navegacion__link">incio</a>
                        <span class="menu__navegacion__name"><?php echo $categoria; ?></span>
                    </div>

                    <div class="mostrar">
                        <form class="ordenar" method="POST">
                            <label class="ordenar__label" for="">Ordenar por: </label>
                            <select class="ordenar__select" name="ordenar" id="ordenar">
                                <option value="defecto" data-order="defecto" class="ordenar__option">Orden por defecto</option>
                                <option value="preciobajo" data-order="preciobajo" class="ordenar__option">Orden por bajo precio</option>
                                <option value="precioalto" data-order="precioalto" class="ordenar__option">Orden por alto precio</option>
                            </select>
                        </form>
                    </div>
                </div>
                <?php
                    echo $centros = $Admin->filtradoCategoria("",$categoria, $npagina, 6);
                ?>
            </div>
        </div>
    </div>