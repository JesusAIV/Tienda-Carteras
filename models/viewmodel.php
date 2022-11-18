<?php
    class viewmodel{
        protected function obtenervistamodelo($views){
            $lista = ["principal", "tiendas", "quienessomos", "producto", "detalle", "cuenta", "contacto", "carteras",];

            if(in_array($views,$lista)){
                if(is_file("./view/content/".$views.".php")){
                    $contenido = "./view/content/".$views.".php";
                }else{
                    $contenido = "principal";
                }
            }else{
                $contenido = "principal";
            }
            return $contenido;
        }
    }