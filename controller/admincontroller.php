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
        public function agregarProductoC(){
            $idcategoria = $_POST['addpcategoria'];
            $idcolor = $_POST['addpcolor'];
            $producto = $_POST['addpname'];
            $descripcion = $_POST['addpdescripcion'];
            $stock = $_POST['addpstock'];
            $precio = $_POST['addpprecio'];

            if (empty($idcategoria) || empty($idcolor) || empty($producto) || empty($descripcion) || empty($stock) || empty($precio)) {
                // Dará una alerta de error
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "Debe completar todos los campos",
                    "Tipo" => "error"
                ];
            } else {
                // Almacena los datos en un array
                $datosP = [
                    "idcategoria" => $idcategoria,
                    "idcolor" => $idcolor,
                    "producto" => $producto,
                    "descripcion" => $descripcion,
                    "stock" => $stock,
                    "precio" => $precio
                ];

                // Ejecuta la función agregarPersonal obteniendo el array de datos
                $addProducto = adminModel::agregarProducto($datosP);

                if ($addProducto >= 1) { /* Si la consulta se ejecuta correctamente */
                    // Dará una alerta de éxito
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Producto registrado",
                        "Texto" => "El producto se registró correctamente en el sistema",
                        "Tipo" => "success"
                    ];
                    echo '
                        <script>
                            $( function() {
                                $("#table-productos").DataTable().ajax.reload();
                                $(".FormularioAjax")[0].reset();
                            });
                        </script>';
                } else {
                    // Dará una alerta de error
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrio un error inesperado",
                        "Texto" => "No hemos podido agregar el producto",
                        "Tipo" => "error"
                    ];
                }
            }
            return mainModel::sweet_alert($alerta);
        }
    }