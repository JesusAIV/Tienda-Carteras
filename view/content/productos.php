<?php
    if(isset($_SESSION['idrol']) && $_SESSION['idrol'] == 1):
        include "sesioniniciada/productos.php";
    else:
        echo "
        <script>
            window.location.href='home'
        </script>";
    endif;
?>