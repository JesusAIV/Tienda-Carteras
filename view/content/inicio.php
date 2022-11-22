<div class="principal">
    <div class="slider">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="./img/jpg/img1.jpg" style="width:100%">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="./img/jpg/img2.jpg" style="width:100%">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="./img/jpg/img3.jpg" style="width:100%">
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
            <div class="product__list--center category1">
                <a class="product__enlace product__leyend leyend1" href="carteras">
                    <img class="product__img" src="./img/jpg/carteras.jpg" alt="Carteras">
                </a>
            </div>
            <div class="product__list--center category2">
                <a class="product__enlace product__leyend leyend2" href="inicio">
                    <img class="product__img" src="./img/jpg/morrales.jpg" alt="Morrales">
                </a>
            </div>
            <div class="product__list--center category3">
                <a class="product__enlace product__leyend leyend3" href="inicio">
                    <img class="product__img" src="./img/jpg/mochila.jpg" alt="Mochilas">
                </a>
            </div>
            <div class="product__list--center category4">
                <a class="product__enlace product__leyend leyend4" href="inicio">
                    <img class="product__img" src="./img/jpg/bolsos.jpg" alt="Bolsos">
                </a>
            </div>
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
                        <img src="./img/svg/card.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Pagos 100% seguros</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="./img/svg/camion.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Envíos a domicilio</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="./img/svg/recojo.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Recojo en tienda</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="./img/svg/atencioncliente.svg" alt="">
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
                        <img src="./img/svg/yape.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Yape</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="./img/svg/efectivo.svg" alt="">
                    </div>
                    <div class="opcion__parrafo">
                        <p>Efectivo</p>
                    </div>
                </div>
                <div>
                    <div class="opcion--center">
                        <img src="./img/svg/dtbancaria.svg" alt="">
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
        <img src="./img/svg/left-arrow.svg" class="slider__arrow" id="before">

        <section class="slider__body slider__body--show" data-id="1">
            <div class="slider__texts">
                <h2 class="subtitle">¡Hola! mi nombres es Martha</h2>
                <p class="slider__review">
                    Desde que conocí esta magnifica tienda ya no sufro por buscar tipos de carteras, practicamente siempre encuentro lo que busco. Muy bonitos productos! y sobre todo calidad precio.
                </p>
            </div>

            <figure class="slider__picture">
                <img src="./img/jpg/person1.jpg" alt="" class="slider__img">
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
                <img src="./img/jpg/person2.jpg" alt="" class="slider__img">
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
                <img src="./img/jpg/person3.jpg" alt="" class="slider__img">
            </figure>
        </section>

        <img src="./img/svg/right-arrow.svg" class="slider__arrow" id="next">
    </div>
</div>