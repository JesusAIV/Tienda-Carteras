<?php
    if($_SESSION['idrol'] == 1):
        include "sesioniniciada/inventario.php";
    else:
        echo "
        <script>
            window.location.href='home'
        </script>";
    endif;
?>