<?php
        session_start();
         require_once "classes/produto.php";
         require_once "classes/Notification.php";
         require_once "classes/clientes.php";
    class Controlador extends Notification{
        public function index(){
            
        $prod = new Produto();
            $ret = $prod->gerarProduto();
        
            require_once "public/home/home.php";
        }    

        public function inserirCarrinho(){
            $id = 0;
            $cliente = (new Clientes())->obterClientes();
            if($_GET && isset($_GET["id"])):
                
                $linha = -1;
                $id = $_GET["id"];
                $existe = false;

                if(isset($_SESSION["carrinho"])):
                    foreach($_SESSION["carrinho"] as $linha => $valor):
                        if($valor["id"] == $id):
                            $existe =  true;
                        endif;
                    endforeach;
                    endif;
                    if($existe == false):
                $produto = (new Produto())->produtoPorId( $id );               

                $_SESSION["carrinho"][$linha + 1]["id"] =  $produto->getId();
                $_SESSION["carrinho"][$linha + 1]["descricao"] =  $produto->getDescricao();
                $_SESSION["carrinho"][$linha + 1]["preco"] =  $produto->getPreco();
                $_SESSION["carrinho"][$linha + 1]["imagem"] =  $produto->getImagem();
                $_SESSION["carrinho"][$linha + 1]["qtde"] =  1;
                endif;

            endif;
                    require_once "public/carrinho/index.php";
            
            
        }

        public function atualizarCarrinho(){
            if($_POST){
                $linha = $_POST["linha"];
                $qtde = $_POST["quantidade"];

                if($qtde > 0){
                    $_SESSION["carrinho"][$linha]["qtde"] = $qtde;
                }
            }

            if($_GET){
                $linha = $_GET["linha"];
                if(isset($_SESSION["carrinho"][$linha])){
                    unset($_SESSION["carrinho"][$linha]);
                }
                header("location:index.php?arquivo=controlador&metodo=inserirCarrinho");
            }
        
        }

        public function finalizarCarrinho(){

            unset($_SESSION["carrinho"]);

            echo $this->sucess("Carrinho finalizado com sucesso", "controlador", "inserirCarrinho");
           

        }
    }