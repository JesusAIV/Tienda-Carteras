<div class="modal-registro-nuevo-fondo" id="categorianew" style="display: none;">
    <div class="modal-registro-nuevo">
        <div class="modal-new-header">
            <div class="modal-new-header-parrafo">
                <p>Nuevo categoria</p>
            </div>
            <div>
                <img class="modal-registro-nuevo-close" src="<?php echo SERVERURL?>img/svg/close.svg" alt="cerrar modal">
            </div>
        </div>
        <form action="./ajax/crudproducto.php" method="POST" class="ProductosAjax" data-form="add-producto" autocomplete="off" enctype="multipart/form-data">
            <div class="form-new-produc">
                <div class="form-new-produc-data">
                    <div class="campos-new-produc">
                        <label for="addpnamecategoria">Nombre</label>
                        <input type="text" id="addpnamecategoria" class="addpnamecategoria" name="addpnamecategoria">
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpimagen01">
                            Imagen
                        </label>
                        <label for="addpimagencategoria" class="addpimagencategoria">Seleccionar imagen</label>
                        <input type="file" id="addpimagencategoria" class="addpimagencategoria" name="addpimagencategoria">
                    </div>
                    <img width="500px" src="" alt="imagen de producto" id="addpimagencategoriaimg">
                </div>
                <div id=""></div>
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
