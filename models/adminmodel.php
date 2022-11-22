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
    }