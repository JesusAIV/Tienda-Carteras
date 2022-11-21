    <!-- Footer -->
    <footer class="">
        <div class="whatsapp">
            <a href="https://walink.co/a2556c" target="blanck">
                <img src="./img/svg/whatsapp.svg" alt="">
            </a>
        </div>
        <div class="footer">
            <div class="footer-center">
                <div class="footer-datos">
                    <div class="footer-logo">
                        <img class="logo-img" style="margin-right: 1rem;" src="img/png/bolso.png" alt="">
                        <a href="">
                            <h1>Confecciones Milagros</h1>
                        </a>
                    </div>
                    <div class="caja-footer">
                        <ul>
                            <li>Centro comercial Luna Pizarro, Lima, La Victoria 15033</li>
                            <li>Teléfono: +51 972351346</li>
                            <li>Whatsapp : (+51) 982055208</li>
                            <li>confeccionesmilagros@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div class="footer-siguenos">
                    <p>SIGUENOS EN</p>
                    <div class="caja-footer caja-footer--icons">
                        <ul class="redes-sociales">
                            <li>
                                <a href="facebook">
                                    <img class="redes-icon" src="img/svg/fb.svg" alt="facebook">
                                </a>
                            </li>
                            <li>
                                <a href="instagram">
                                    <img class="redes-icon" src="img/svg/ig.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="tiktok">
                                    <img class="redes-icon" src="img/svg/tiktok.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer-puntos">
                    <div class="footer-paginas">
                        <p>PÁGINAS</p>
                        <div class="caja-footer">
                            <ul>
                                <li><a href="quienessomos">¿Quiénes somos?</a></li>
                                <li><a href="tiendas">Nuestras tiendas</a></li>
                                <li><a href="contacto">Contacto</a></li>
                                <?php
                                    if(!isset($_SESSION['email'])){
                                        ?>
                                        <li><a href="cuenta">Mi Cuenta</a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-categorias">
                        <div>
                            <p>CATEGORÍAS</p>
                        </div>
                        <div class="caja-footer">
                            <ul>
                                <li><a href="producto">Carteras</a></li>
                                <li><a href="producto">Morrales</a></li>
                                <li><a href="producto">Mochilas</a></li>
                                <li><a href="producto">Bolsos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="derechos-reservados">
                <p>Copyright &#169; 2022 Confecciones Milagros - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>