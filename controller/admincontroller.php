<?php
    // Si se realiza la petición Ajax
    if ($Ajax) {
        // obtiene el archivo model/adminModel.php
        require_once "../models/adminmodel.php";
        require_once "../core/conexion.php";
        require_once "../core/constantes.php";
    } else {
        // obtiene el archivo model/adminModel.php
        require_once "./models/adminmodel.php";
        require_once "./core/conexion.php";
        require_once "./core/constantes.php";
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
                $directorio = adminModel::imagenProducto($row['imagen']);
                $data = [
                    "contador" => $contador,
                    "idproducto" => $row['idproducto'],
                    "producto" => $row['producto'],
                    "precio" => $row['precio'],
                    "descripcion" => $row['descripcion'],
                    "stock" => $row['stock'],
                    "categoria" => $row['categoria'],
                    "color" => $row['color'],
                    "imagen" => '<img class="image-table-product" src="'.$directorio.'">',
                    "editar" => '<button class="mostrar-producto">
                                    <img src="'.SERVERURL.'img/svg/eyes.svg">
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

            $conexion = Conexion::conectar();

            $sqlcat = "SELECT * FROM categoria WHERE idcategoria = '$idcategoria'";
            $consultacat = $conexion->query($sqlcat);
            $consultacat = $consultacat->fetch_all(MYSQLI_ASSOC);

            foreach ($consultacat as $key){}

            $dir = "../img/productos/".$key['categoria']."/";
            $nombreArchivo = $_FILES['addpimagen']['name'];
            $tipo = $_FILES['addpimagen']['type'];
            $tipo = strtolower($tipo);
            $extension = substr($tipo,strpos($tipo,'/')+1);
            $name = $nombreArchivo.'-'.time().'.'.$extension;

            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            move_uploaded_file($_FILES['addpimagen']['tmp_name'], $dir.$name);

            $directorio = $dir.$name;

            $imagen = substr($directorio, 3);


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
                    "precio" => $precio,
                    "imagen" => $imagen
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
        public function DatosCategoria($nombrecategoria){

            $conexion = Conexion::conectar();
            $sql = "CALL DatosCategoria('$nombrecategoria')";
            $consulta = $conexion->query($sql);
            $consulta = $consulta->fetch_all(MYSQLI_ASSOC);

            return $consulta;
        }
        public function DatosProducto($nombreproducto){

            $conexion = Conexion::conectar();
            $sql = "CALL DatosProducto('$nombreproducto')";
            $consulta = $conexion->query($sql);
            $consulta = $consulta->fetch_all(MYSQLI_ASSOC);

            return $consulta;
        }
        public function agregarColorC(){
            $color = $_POST['addpnamecolor'];
            $codigohex = $_POST['addpimagencolorhex'];

            $conexion = Conexion::conectar();

            $codigohex = substr($codigohex, 1);

            $sqlcolor = "SELECT color FROM colores WHERE color = '$color'";
            $result = $conexion->query($sqlcolor);
            $cantidad = $result->num_rows;

            if($cantidad >= 1){
                $alerta = [
                    "Alerta" => "mensaje",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "El color ya se encuestra registrado en el sistema",
                    "Tipo" => "error"
                ];
            }else{
                $sqlcolorhex = "SELECT codigohex FROM colores WHERE codigohex = '$codigohex'";
                $resultt = $conexion->query($sqlcolorhex);
                $cantidadt = $resultt->num_rows;

                if($cantidadt >= 1){
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrio un error inesperado",
                        "Texto" => "El color ya se encuestra registrado en el sistema",
                        "Tipo" => "error"
                    ];
                }else{
                    if (empty($color) || empty($codigohex)) {
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
                            "color" => $color,
                            "codigohex" => $codigohex
                        ];

                        // Ejecuta la función agregarPersonal obteniendo el array de datos
                        $addProducto = adminModel::agregarColor($datosP);

                        if ($addProducto >= 1) { /* Si la consulta se ejecuta correctamente */
                            // Dará una alerta de éxito
                            $alerta = [
                                "Alerta" => "simple",
                                "Titulo" => "Color registrado",
                                "Texto" => "El color se registró correctamente en el sistema",
                                "Tipo" => "success"
                            ];
                            echo '
                                <script>
                                    $( function() {
                                        $(".FormularioAjax")[0].reset();
                                        $("#averagecolor").css("background-color", "white");
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
                }
            }

            return mainModel::sweet_alert($alerta);
        }
        public function agregarCategoriaC(){
            $categoria = $_POST['addpnamecategoria'];

            $conexion = Conexion::conectar();

            $sqlcolor = "SELECT categoria FROM categoria WHERE categoria = '$categoria'";
            $result = $conexion->query($sqlcolor);
            $cantidad = $result->num_rows;

            if($cantidad >= 1){
                $alerta = [
                    "Alerta" => "mensaje",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "La categoria ya se encuestra registrado en el sistema",
                    "Tipo" => "error"
                ];
            }else{
                if (empty($categoria)) {
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
                        "categoria" => $categoria
                    ];

                    // Ejecuta la función agregarPersonal obteniendo el array de datos
                    $addProducto = adminModel::agregarCategoria($datosP);

                    if ($addProducto >= 1) { /* Si la consulta se ejecuta correctamente */
                        // Dará una alerta de éxito
                        $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "Categoria registrado",
                            "Texto" => "La categoria se registró correctamente en el sistema",
                            "Tipo" => "success"
                        ];
                        echo '
                            <script>
                                $( function() {
                                    $(".FormularioAjax")[0].reset();
                                });
                            </script>';
                    } else {
                        // Dará una alerta de error
                        $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "Ocurrio un error inesperado",
                            "Texto" => "No hemos podido agregar la categoria",
                            "Tipo" => "error"
                        ];
                    }
                }
            }

            return mainModel::sweet_alert($alerta);
        }
    }