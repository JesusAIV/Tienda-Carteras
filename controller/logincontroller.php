<?php
    if ($Ajax){
        require_once "../models/loginmodel.php";
        require_once "../core/conexion.php";
    } else {
        require_once "./models/loginmodel.php";
        require_once "./core/conexion.php";
    }

    class logincontrolador extends LoginModel{

        public function iniciar_sesion_controlador(){
            $email = $_POST['email'];
            $password = $_POST['password'];

            // $clave=mainModel::encryption($clave);

            $datosLogin=[
                "email"=>$email,
                "password"=>$password
            ];

            $datosCuenta = LoginModel::iniciar_sesion($datosLogin);

            $rowCount = $datosCuenta->num_rows;

            $row = $datosCuenta->fetch_array(MYSQLI_ASSOC);

            if(empty($email) || empty($password)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Campos vacíos",
                    "Texto"=>"Debe ingresar sus datos",
                    "Tipo"=>"error"
                ];
                return mainModel::sweet_alert($alerta);
            }else{
                if($rowCount==1){
                    session_start();
                    $_SESSION['idrol']=$row['idrol'];
                    $_SESSION['nombre']=$row['nombre'];
                    $_SESSION['apellidos']=$row['apellidos'];
                    $_SESSION['usuario']=$row['usuario'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['password']=$row['password'];

                    if ($row['idrol'] == 1){
                        $url = "inventario";
                    }else{
                        $url = "inicio";
                    }
                    return $urlLocation = '<script> window.location="'.$url.'"</script>';
                }else{
                    $alerta=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrió un error inesperado",
                        "Texto"=>"Datos incorrectos",
                        "Tipo"=>"error"
                    ];
                    return mainModel::sweet_alert($alerta);
                }
            }
        }

        public function forzar_cierre_sesion(){
            session_destroy();
            return header("Location: cuenta");
        }
    }