<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();
?>
<div class="container-productos">
    <div class="productos-title">
        <p>PRODUCTOS</p>
    </div>
    <div class="administracion-producto">
        <div class="productos-n">
            <div class="opc-productos-n">
                <div class="productos-n-text">
                    <p>Administrar Productos</p>
                </div>
                <div class="new-producto">
                    <button id="new-producto">
                        <img src="<?php echo SERVERURL?>img/svg/bag.svg" alt="bolsa">
                        <span>Nuevo Producto</span>
                    </button>
                    <button id="new-color">
                        <img src="<?php echo SERVERURL?>img/svg/bag.svg" alt="bolsa">
                        <span>Nuevo Color</span>
                    </button>
                    <button id="new-categoria">
                        <img src="<?php echo SERVERURL?>img/svg/bag.svg" alt="bolsa">
                        <span>Nueva Categoria</span>
                    </button>
                </div>
            </div>
            <hr>
        </div>
        <div class="tabla-productos">
            <table id="table-productos" class="cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Categorias</th>
                        <th>Color</th>
                        <th>Imagen</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    include "modals/newproducto.php";
    include "modals/newcolor.php";
    include "modals/newcategoria.php";
    include "modals/updateproducto.php";
?>