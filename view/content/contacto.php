<main class="main__contacto">
    <picture class="mapa">
        <iframe class="mapa__top" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d243.8607766567083!2d-77.0277216!3d-12.0591731!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8bc279e3345%3A0xc237ff08b9a17f04!2sJr.%20Renovaci%C3%B3n%20104%2C%20Cercado%20de%20Lima%2015033!5e0!3m2!1ses-419!2spe!4v1668292347938!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </picture>

    <section class="contacto__formulario">
        <h2 class="contacto__title">COMUNICATE CON NUESTRO EQUIPO DE SOPORTE</h2>

        <p class="contacto__paragraph">
            No dudes en comunicar cualquier inquietud que tengas, Confecciones Milagros está aquí para resolver tus dudas.
        </p>

        <form action="#" method="POST" class="formulario">
            <div class="group">
                <label for="nombres" class="group__label">Nombres</label>
                <input type="text" class="group__input" name="nombres" id="nombres">
            </div>

            <div class="group">
                <label for="apellidos" class="group__label">Apellidos</label>
                <input type="text" class="group__input" name="apellidos" id="apellidos">
            </div>

            <div class="group">
                <label for="celular" class="group__label">Celular</label>
                <input type="tel" class="group__input" name="celular" id="celular">
            </div>

            <div class="group">
                <label for="correo" class="group__label">Correo</label>
                <input type="email" class="group__input" name="correo" id="correo">
            </div>

            <textarea name="mensaje" id="mensaje" cols="90" rows="10" placeholder="Redacta tu mensaje"></textarea>

            <div class="group">
                <button type="submit" class="group__enviar" name="correo" id="correo">Enviar Mensaje</button>
            </div>
        </form>
    </section>

    <section class="contacto__information">
        <h2 class="contacto__title">INFORMACIÓN DE CONTACTO</h2>

        <div class="group">
            <label for="direccion" class="group__label">Dirección</label>
            <span class="group__leyend">Centro comercial Luna Pizarro, Lima, La Victoria 15033</span>
        </div>

        <div class="group">
            <label for="celular" class="group__label">Celular</label>
            <a href="https://api.whatsapp.com/send?phone=+51939304773&text=Hola, me gustaría comprar tu producto!" target="_blank">+51939304773</a>
        </div>

        <div class="group">
            <label for="correo" class="group__label">Correo</label>
            <a href="mailto:confeccionesmilagros@gmail.com">confeccionesmilagros@gmail.com</a>
        </div>

        <div class="redes">
            <figure class="figure">
                <a class="figure__link" href="#">
                    <img class="figure__link__icon" src="./img/svg/fb_contacto.svg" alt="facebook">
                </a>
            </figure>

            <figure class="figure">
                <a class="figure__link" href="#">
                    <img class="figure__link__icon" src="./img/svg/ig_contacto.svg" alt="instagram">
                </a>
            </figure>

            <figure class="figure">
                <a class="figure__link" href="#">
                    <img class="figure__link__icon" src="img/svg/tiktok_contacto.svg" alt="tiktok">
                </a>
            </figure>
        </div>

    </section>

</main>