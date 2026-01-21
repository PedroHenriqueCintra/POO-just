
<?php


        

        if($_GET){
            if(isset($_GET['parametro'])){
            $parametro = $_GET['parametro'];
        }

            $controler = $_GET["arquivo"];
            $metodo = $_GET["metodo"];        

            require_once 'classes/'.$controler.'.php';
            $obj = new $controler();
            if(isset($_GET['parametro']) && $_GET["parametro"] !== ""){
                $obj->$metodo($parametro);
        }else{
            $obj->$metodo();
        }
            
        }
            else{
                 require_once "classes/Controlador.php";
                 $obj = new Controlador();
                 $obj->index();
        }
    ?>