<div class="modal-registro-nuevo-fondo" id="colornew" style="display: none;">
    <div class="modal-registro-nuevo">
        <div class="modal-new-header">
            <div class="modal-new-header-parrafo">
                <p>Nuevo color</p>
            </div>
            <div>
                <img class="modal-registro-nuevo-close" src="<?php echo SERVERURL?>img/svg/close.svg" alt="">
            </div>
        </div>
        <form action="./ajax/crudproducto.php" method="POST" class="ProductosAjax" data-form="add-producto" autocomplete="off" enctype="multipart/form-data">
            <div class="form-new-produc">
                <div class="form-new-produc-data">
                    <div class="campos-new-produc">
                        <label for="addpnamecolor">Nombre</label>
                        <input type="text" id="addpnamecolor" class="addpnamecolor" name="addpnamecolor">
                    </div>
                    <div class="campos-new-produc">
                        <label for="addpimagen01">
                            Imagen
                        </label>
                        <label for="addpimagencolorinput" class="addpimagencolor">Seleccionar imagen</label>
                        <input type="file" id="addpimagencolorinput" class="addpimagencolor" name="addpimagencolor">
                        <img src="" alt="" id="addpimagencolor" data-adaptive-background >
                    </div>
                    <span>Seleccione una imagen del que desea obtener el color</span>
                    <div>
                        <label for="averagecolor" id="averagecolorlabel"></label>
                        <input type="text" id="averagecolor">
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
