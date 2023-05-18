    <?php
        $Ajax = false;
        require_once "./controller/admincontroller.php";
        $Admin = new adminController();
    ?>
<!-- Footer -->
    <footer class="footer">
        <div class="whatsapp">
            <a href="https://walink.co/a2556c" target="blanck">
                <img src="<?php echo SERVERURL?>view/img/svg/whatsapp.svg" alt="whatsapp">
            </a>
        </div>
        <div class="footer">
            <div class="footer-center">
                <div class="footer-datos">
                    <div class="footer-logo">
                        <img class="logo-img" style="margin-right: 1rem;" src="<?php echo SERVERURL?>view/img/png/bolso.png" alt="bolso">
                        <a href="<?php echo SERVERURL ?>inicio">
                            <h1 class="inicio__title">Confecciones Milagros</h1>
                        </a>
                    </div>
                    <div class="caja-footer">
                        <ul>
                            <li>Centro comercial Luna Pizarro, Lima, La Victoria 15033</li>
                            <li>Teléfono: +51 972351346</li>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=+51939304773&text=Hola, me gustaría comprar tu producto!" target="_blank"">
                                    Whatsapp : (+51) 939304773
                                </a>
                            </li>
                            <li>
                                <a href=" mailto:confeccionesmilagros@gmail.com">
                                    confeccionesmilagros@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer-siguenos">
                    <p class="footer__leyend">SIGUENOS EN</p>
                    <div class="caja-footer caja-footer--icons">
                        <ul class="redes-sociales">
                            <li>
                                <a href="#">
                                    <i class="redes-icon fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="redes-icon fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="redes-icon fa-brands fa-tiktok"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer-puntos">
                    <div class="footer-paginas">
                        <p class="footer__leyend">PÁGINAS</p>
                        <div class="caja-footer">
                            <ul>
                                <li><a class="footer__link" href="<?php echo SERVERURL ?>quienessomos">¿Quiénes somos?</a></li>
                                <li><a class="footer__link" href="<?php echo SERVERURL ?>tiendas">Nuestras tiendas</a></li>
                                <li><a class="footer__link" href="<?php echo SERVERURL ?>contacto">Contacto</a></li>
                                <?php
                                if (isset($_SESSION['email']) && isset($_SESSION['idrol']) && $_SESSION['idrol'] == 1) {
                                ?>
                                    <li><a class="footer__link" href="<?php echo SERVERURL ?>inventario">Inventario</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-categorias">
                        <div>
                            <p class="footer__leyend">CATEGORÍAS</p>
                        </div>
                        <div class="caja-footer">
                            <ul>
                                <?php
                                    $centros =  $Admin->ListarCategorias();
                                    foreach ($centros as $key) {
                                        ?>
                                        <li>
                                            <a href="<?php echo SERVERURL.'categoria/'.$key['categoria'] ?>"><?php echo ucfirst($key['categoria']) ?></a>
                                        </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="derechos-reservados">
                <p>Copyright &#169; 2022 Confecciones Milagros - Todos los derechos reservados / Diseñado por Alvaro Villanueva & Jesús Isique</p>
            </div>
        </div>
    </footer>
