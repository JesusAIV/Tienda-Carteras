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
                <div class="new-producto" id="new-producto">
                    <button>
                        <img src="<?php echo SERVERURL?>img/svg/bag.svg" alt="bolsa">
                        <span>Nuevo</span>
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
<div class="modal-registro-nuevo-fondo" style="display: none;">
    <div class="modal-registro-nuevo">
        <div class="modal-new-header">
            <div class="modal-new-header-parrafo">
                <p>Nuevo producto</p>
            </div>
            <div>
                <img class="modal-registro-nuevo-close" src="<?php echo SERVERURL?>img/svg/close.svg" alt="">
            </div>
        </div>
        <form action="./ajax/crudproducto.php" method="POST" class="ProductosAjax" data-form="add-producto" autocomplete="off" enctype="multipart/form-data">
            <div class="form-new-produc">
                <div class="form-new-produc-data">
                    <div class="campos-new-produc">
                        <label for="addpname">Nombre</label>
                        <input type="text" id="addpname" class="addpname" name="addpname">
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpprecio">Precio</label>
                        <input type="text" id="addpprecio" class="addpprecio" name="addpprecio" pattern="^\d*(\.\d{0,2})?$">
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpdescripcion">Descripcion</label>
                        <input type="text" id="addpdescripcion" class="addpdescripcion" name="addpdescripcion">
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpcolor">Color</label>
                        <select id="addpcolor" class="addpcolor" name="addpcolor">
                            <?php
                                $centros =  $Admin->ListarColores();
                                foreach ($centros as $key) {
                                    ?>
                                    <option value="<?php echo $key['idcolor'] ?>"><?php echo $key['color'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpcategoria">Categoria</label>
                        <select id="addpcategoria" class="addpcategoria" name="addpcategoria">
                            <?php
                                $centros =  $Admin->ListarCategorias();
                                foreach ($centros as $key) {
                                    ?>
                                    <option value="<?php echo $key['idcategoria'] ?>"><?php echo $key['categoria'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpstock">Stock</label>
                        <input type="number" min="0" id="addpstock" class="addpstock" name="addpstock">
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpimagen01">Imagen</label>
                        <label for="addpimagen" class="addpimagen">Seleccionar imagen</label>
                        <input type="file" min="0" id="addpimagen" class="addpimagen" name="addpimagen">
                    </div>
                </div>
            </div>
            <div class="save-new-produc">
                <button>
                    Aceptar
                </button>
            </div>
            <div class="RespuestaAjax"></div>
        </form>
    </div>
</div>
