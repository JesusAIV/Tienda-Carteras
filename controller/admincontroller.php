<?php
    // Si se realiza la petición Ajax
    if ($Ajax) {
        // obtiene el archivo model/adminModel.php
        require_once "../models/adminmodel.php";
        require_once "../core/conexion.php";
    } else {
        // obtiene el archivo model/adminModel.php
        require_once "./models/adminmodel.php";
        require_once "./core/conexion.php";
    }

    // Se cre la clase adminController obteniendo las funciones de la clase adminModel
    class adminController extends adminModel{
        public function ListarProductos(){
            $conexion = Conexion::conectar();

            $sql = "CALL ListarProductos()";
            $datos = $conexion->query($sql);
            $datos = $datos->fetch_all(MYSQLI_ASSOC);
            $mData = array();

            $contador = 1;
            foreach ($datos as $row) {
                $estadoproduc = adminModel::stockProducto($row['stock']);
                $data = [
                    "contador" => $contador,
                    "idproducto" => $row['idproducto'],
                    "producto" => $row['producto'],
                    "precio" => $row['precio'],
                    "descripcion" => $row['descripcion'],
                    "stock" => $row['stock'],
                    "categoria" => $row['categoria'],
                    "color" => $row['color'],
                    "editar" => '<button class="mostrar-producto">
                                    <img src="./img/svg/eyes.svg">
                                </button>',
                    "estado" => $estadoproduc

                ];
                $mData[]=$data;
                $contador++;
            }

            $data = json_encode($mData, JSON_UNESCAPED_UNICODE);

            return $data;
        }
        public function ListarCategorias(){
            $conexion = Conexion::conectar();
            $sql = "CALL ListarCategorias()";
            $consulta = $conexion->query($sql);
            $consulta = $consulta->fetch_all(MYSQLI_ASSOC);
            return $consulta;
        }
        public function ListarColores(){
            $conexion = Conexion::conectar();
            $sql = "CALL ListarColores()";
            $consulta = $conexion->query($sql);
            $consulta = $consulta->fetch_all(MYSQLI_ASSOC);
            return $consulta;
        }
    }