<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();
?>
<div class="principal">
    <div class="slider">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="<?php echo SERVERURL ?>img/jpg/img1.jpg">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="<?php echo SERVERURL ?>img/jpg/img2.jpg">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="<?php echo SERVERURL ?>img/jpg/img3.jpg">
                <div class="text">Caption Three</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="nextslider" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>

    <div class="principal__productos">
        <div class="principal__productos--title">
            <p>NUESTROS PRODUCTOS</p>
        </div>
        <div class="principal__productos--lista">
            <?php
                $centros =  $Admin->ListarCategorias();
                $numcategoria = 1;
                foreach ($centros as $key) {
                    ?>
                <div class="product__list--center category<?php echo $numcategoria ?>">
                    <a class="product__enlace product__leyend leyend<?php echo $numcategoria ?>" href="<?php echo 'categoria/'.$key['categoria'] ?>">
                        <img class="product__img" src="<?php echo SERVERURL.$key['imagen'] ?>" alt="<?php echo $key['categoria'] ?>">
                    </a>
                    <style>
                        <?php echo '.leyend'.$numcategoria.'::after{ content: "'.strtoupper($key['categoria']).'"}' ?>
                    </style>
                </div>
            <?php
                $numcategoria ++;
                }
            ?>
        </div>
    </div>

    <div class="principal__ofrece">
        <div class="ofrece__opcion">
            <div class="oferece__title">
                <p>CONFECCIONES MILAGROS TE OFRECE</p>
            </div>
            <div class="ofrece__opcion--grid">
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/card.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Pagos 100% seguros</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/camion.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Envíos a domicilio</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/recojo.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Recojo en tienda</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/atencioncliente.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Atención al cliente</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ofrece__opcion">
            <div class="oferece__title">
                <p>Métodos de pago</p>
            </div>
            <div class="opcion__pago--grid">
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/yape.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Yape</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/efectivo.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Efectivo</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="<?php echo SERVERURL?>img/svg/dtbancaria.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Depósito/Transferecia Bancaria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="opiniones">
        <div class="oferece__title">
            <p class="opiniones__leyend">Nuestros clientes confirman que CONFECCIONES MILAGROS ES CALIDAD PRECIO</p>
        </div>
    </div>

    <div class="principal__opiniones">
        <img src="<?php echo SERVERURL?>img/svg/left-arrow.svg" class="slider__arrow" id="before">

        <section class="slider__body slider__body--show" data-id="1">
            <div class="slider__texts">
                <h2 class="subtitle">¡Hola! mi nombres es Martha</h2>
                <p class="slider__review">
                    Desde que conocí esta magnifica tienda ya no sufro por buscar tipos de carteras, practicamente siempre encuentro lo que busco. Muy bonitos productos! y sobre todo calidad precio.
                </p>
            </div>

            <figure class="slider__picture">
                <img src="<?php echo SERVERURL?>img/jpg/person1.jpg" alt="" class="slider__img">
            </figure>
        </section>

        <section class="slider__body" data-id="2">
            <div class="slider__texts">
                <h2 class="subtitle">¡Hola! mi nombres es Jessica</h2>
                <p class="slider__review">
                    Anteriormente me la pasa todo el día buscando un buen accesorio para ir a mis reuniones, no encontraba lo que buscaba, pero desde que encontré a "Confecciones Milagros", mi vida cambió, ahora puedo separar mi producto en el tiempo que quiera y poder disfrutar con mas elegencia mis reuniones de trabajo.
                </p>
            </div>

            <figure class="slider__picture">
                <img src="<?php echo SERVERURL?>img/jpg/person2.jpg" alt="" class="slider__img">
            </figure>
        </section>

        <section class="slider__body" data-id="3">
            <div class="slider__texts">
                <h2 class="subtitle">¡Hola! mi nombres es Rosalinda</h2>
                <p class="slider__review">
                    Me considero exigente en cuento a accesorios y modas, eh encontrado varios luegares donde ofrecen productos de calidad, "Confecciones Milagros" no es la exepción, ofrecen un servicio y producto de calidad, sin duda debes visitarla, ¡Te encatará!.
                </p>
            </div>

            <figure class="slider__picture">
                <img src="<?php echo SERVERURL?>img/jpg/person3.jpg" alt="" class="slider__img">
            </figure>
        </section>

        <img src="<?php echo SERVERURL?>img/svg/right-arrow.svg" class="slider__arrow" id="next">
    </div>
</div>