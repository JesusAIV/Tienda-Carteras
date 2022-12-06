<div class="modal fade" id="productoupdate"  aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class=" modal-body">
                <div class="modal-new-header">
                    <div class="modal-new-header-parrafo">
                        <p>Nuevo producto</p>
                    </div>
                    <div>
                        <img class="" data-bs-dismiss="modal" style="cursor: pointer;" src="<?php echo SERVERURL?>view/img/svg/close.svg" alt="cerrar modal">
                    </div>
                </div>
                <form action="<?php echo SERVERURL?>view/ajax/crudproducto.php" method="POST" class="ProductosAjax" data-form="up-producto" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="uppid" id="uppid">
                    <div class="form-new-produc">
                        <div class="form-new-produc-data">
                            <div class="campos-new-produc">
                                <label for="uppname">Nombre</label>
                                <input type="text" id="uppname" class="uppname" name="uppname">
                            </div>
                            <div class="campos-new-produc">
                                <label for="uppprecio">Precio</label>
                                <input type="text" id="uppprecio" class="uppprecio" name="uppprecio" pattern="^\d*(\.\d{0,2})?$">
                            </div>
                            <div class="campos-new-produc">
                                <label for="uppdescripcion">Descripcion</label>
                                <textarea type="text" id="uppdescripcion" class="uppdescripcion" name="uppdescripcion"></textarea>
                            </div>
                            <div class="campos-new-produc">
                                <label for="uppcolor">Color</label>
                                <select id="uppcolor" class="uppcolor" name="uppcolor">
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
                                <label for="uppcategoria">Categoria</label>
                                <select id="uppcategoria" class="uppcategoria" name="uppcategoria">
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
                                <label for="uppstock">Stock</label>
                                <input type="number" min="0" id="uppstock" class="uppstock" name="uppstock">
                            </div>
                            <div class="campos-new-produc">
                                <img src="" alt="" id="uppimagensrc" width="200px">
                            </div>
                            <div class="campos-new-produc">
                                <label for="uppimagen01">Imagen</label>
                                <label for="uppimagen" class="uppimagen">Seleccionar imagen</label>
                                <input type="file" min="0" id="uppimagen" class="uppimagen" name="uppimagen">
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
    </div>
</div>
