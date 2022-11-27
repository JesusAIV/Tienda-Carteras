<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();

    $pagina = explode("/", $_GET['views']);

    $nombreproducto = $pagina[1];

    $producto = $Admin->DatosProducto($nombreproducto);

    foreach ($producto as $key) {}
?>
<div class="principal">
    <div class="detail">

        <section class="principal__show">
            <div class="principal__image">
                <div class="principal__circle">
                    <img src="<?php echo SERVERURL ?>img/svg/lupa.svg" alt="lupa" class="principal__icon">
                    <img src="<?php echo SERVERURL.$key['imagen'] ?>" alt="img_producto" class="principal__img">
                </div>
            </div>
        </section>

        <section class="principal__detail">
            <div class="menu__navegacion">
                <a href="<?php echo SERVERURL ?>inicio" class="menu__navegacion__link">incio</a>
                <span class="menu__navegacion__name"><?php echo $key['producto'] ?></span>
            </div>

            <div class="detail__content">
                <div class="detail__header">
                    <h2 class="detail__title"><?php echo $key['producto'] ?></h2>
                    <p class="detail__price"><?php echo 'S/'.$key['precio'] ?></p>
                </div>

                <div class="detail__body">
                    <h3 class="detail__body__title"><?php echo $key['descripcion'] ?></h3>
                    <ul class="detail__items">
                        <div class="group">
                            <li class="detail__item">Medidas: </li>
                            <span class="detail__item__text">19cm x 25cm</span>
                        </div>

                        <div class="group">
                            <li class="detail__item">Color: </li>
                            <span class="detail__item__text"><?php echo $key['color'] ?></span>
                        </div>

                        <div class="group">
                            <li class="detail__item">Material: </li>
                            <span class="detail__item__text">Cuero</span>
                        </div>
                    </ul>

                    <div class="stock">
                        <img class="stock__icon" src="<?php echo SERVERURL ?>img/svg/check.svg" alt="check-icon">
                        <h3 class="stock__number"><?php echo $key['stock'] ?></h3>
                        <h3 class="stock__text">disponibles</h3>
                    </div>

                    <ul class="detail__extra">
                        <li class="detail__item">
                            <label class="detail__name" for="acordion">Garantía
                                <img src="<?php echo SERVERURL ?>img/svg/arrow-bottom.svg" class="detail__icon">
                            </label>
                            <input type="checkbox" id="acordion" class="detail__input">

                            <p class="detail__paragraph">
                                Este producto cuenta con una garantía por defecto de fabricación de 90 días calendario, contados a partir de la fecha de compra del producto. Para mayor información puede comunicarse a <a class="detail__references" href="mailto:confeccionesmilagros@gmail.com" target="_blank">confeccionesmilagros@gmail.com</a> o al whatsapp <a class="detail__references" href="https://wa.me/51972351346">+51972351346</a>
                            </p>
                        </li>

                        <li class="detail__item">
                            <label class="detail__name" for="acordion_cuidado">Cuidado del producto
                                <img src="<?php echo SERVERURL ?>img/svg/arrow-bottom.svg" class="detail__icon">
                            </label>
                            <input type="checkbox" id="acordion_cuidado" class="detail__input">
                            <ul class="product__care">
                                <li class="care__item">Evita exponerlo a sustancias químicas como alcohol, perfume o acetona.</li>
                                <li class="care__item">No la guardes es espacios cerrados, húmedos ni en bolsas plásticas.</li>
                                <li class="care__item">Límpiala usando un paño blanco húmedo sin mojar los accesorios. Si el material es PU, hazle mantenimiento una vez al mes utilizando silicona de auto en spray no graso.</li>
                            </ul>

                        </li>

                    </ul>

                </div>

            </div>

        </section>

    </div>
</div>