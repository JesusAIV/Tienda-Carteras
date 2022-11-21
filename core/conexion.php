<?php
class Conexion{
    // Función protegida para la Conexion
    public static function conectar(){
        $host = "127.0.0.1";
        $username = "root";
        $pass = "";
        $database = "cmilagros";
        $conexion = mysqli_connect($host,$username,$pass,$database);

        // retorna la conexion
        return $conexion;
    }
}

// Conexion Hosting
// class Conexion{
//     // Función protegida para la Conexion
//     public static function conectar(){
//         $host = "localhost";
//         $username = "id19873917_root";
//         $pass = "WmK1bHFWx]7J@0Qh";
//         $database = "id19873917_cmilagros";
//         $conexion = mysqli_connect($host,$username,$pass,$database);

//         // retorna la conexion
//         return $conexion;
//     }
// }