<?php
        session_start();
         require_once "classes/produto.php";
    class Controlador{
        public function index(){
            
        $prod = new Produto();
            $ret = $prod->gerarProduto();
        
            require_once "public/home/home.php";
        }    

        public function inserirCarrinho(){
            $id =  "";

            if($_GET && isset($_GET["id"])):
                $id = $_GET["id"];
                $_SESSION["carrinho"];
                $_SESSION["carrinho"]["id"] =  $id;
                endif;
                    require_once "public/carrinho/index.php";
            
            
        }
    }