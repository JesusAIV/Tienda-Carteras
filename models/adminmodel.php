<?php
    if ($Ajax){
        require_once "../models/mainmodel.php";
    }else {
        require_once "./models/mainmodel.php";
    }

    class adminModel extends mainModel{
        protected function informacionProducto($idproducto){

        }
        protected function stockProducto($stock){
            if($stock > 0){
                $estadoproduc = '<button class="estadostock">
                                    En stock
                                </button>';
            }else{
                $estadoproduc = '<button class="estadoagotado">
                                    Agotado
                                </button>';
            }

            return $estadoproduc;
        }
        protected function agregarProducto($datos){
            $conexion = Conexion::conectar();

            $idcategoria=$datos['idcategoria'];
            $idcolor=$datos['idcolor'];
            $producto=$datos['producto'];
            $descripcion=$datos['descripcion'];
            $stock=$datos['stock'];
            $precio=$datos['precio'];
            $imagen=$datos['imagen'];

            echo $idcategoria;

            $sql = "CALL AgregarProducto('$producto', $precio, '$descripcion', $idcolor, $idcategoria, $stock, '$imagen')";

            $result = $conexion->query($sql);

            return $result;
        }
    }