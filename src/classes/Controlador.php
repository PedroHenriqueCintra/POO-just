<?php
        session_start();
         require_once "classes/produto.php";
         require_once "classes/Notification.php";
         require_once "classes/clientes.php";
         require_once "classes/Boleto.php";
        require_once "classes/Paypal.php";
        require_once "classes/Cartao.php";

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
            if(!isset($_SESSION["qtdeProduto"])):
                    $_SESSION["qtdeProduto"] = 0;
                    endif;
                    $_SESSION["qtdeProduto"] += 1;
                endif;
            endif;
                    require_once "public/carrinho/index.php";
            
            
        }

        public function atualizarCarrinho(){

    // ATUALIZAR QUANTIDADE
    if ($_POST && isset($_POST["linha"], $_POST["quantidade"])) {

        $linha = (int) $_POST["linha"];
        $qtde  = (int) $_POST["quantidade"];

        if (
            $qtde > 0 &&
            isset($_SESSION["carrinho"][$linha])
        ) {
            $_SESSION["carrinho"][$linha]["qtde"] = $qtde;

            $_SESSION["qtdeProduto"] = 0;
            foreach ($_SESSION["carrinho"] as $item) {
                $_SESSION["qtdeProduto"] += $item["qtde"];
            }
        }
    }

    // REMOVER ITEM
    if (isset($_GET["linha"])) {

        $linha = $_GET["linha"];

        if (isset($_SESSION["carrinho"][$linha])) {
            $_SESSION["qtdeProduto"] -= $_SESSION["carrinho"][$linha]["qtde"];

            unset($_SESSION["carrinho"][$linha]);
            $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
        }

        header("Location: index.php?arquivo=Controlador&metodo=inserirCarrinho");
        exit;
    }
}


        public function finalizarCarrinho(){
            if ($_POST && isset($_POST["cliente"], $_POST["formaPagamento"])) {

    $clienteId = (int) $_POST["cliente"];
    $formaPag  = $_POST["formaPagamento"];

    // BUSCA CLIENTE
    $cli = (new Clientes())->obterClientes();
    $cliSelecionado = null;

    foreach ($cli as $valor) {
        if ($valor->getId() == $clienteId) {
            $cliSelecionado = $valor;
            break;
        }
    }

    if (!$cliSelecionado) {
        echo "Cliente não encontrado";
        return;
    }

    // FORMA DE PAGAMENTO (SWITCH)
    $formaPagamento = null;
    $descricaoPagar = null;

    switch ($formaPag) {
        case "1":
            $formaPagamento = new Boleto();
            $formaPag= "Boleto";
            $descricaoPagar = "Boleto";           
            break;

        case "2":
            $formaPagamento = new Paypal();
            $formaPag = "Paypal";
            $descricaoPagar = "PayPal";  
            break;

        case "3":
            $formaPagamento = new Cartao();
            $formaPag = "Cartao"; 
            $descricaoPagar = "Cartão de Credito";             
            break;

        default:
            echo "Forma de pagamento inválida";
            return;
    }

    echo "<link rel='stylesheet' href='lib/mensagem.css'>";
    echo "
<div class='kabum-pagamento'>

    <h2>Detalhes da Compra</h2>

    <p><strong>Cliente:</strong> {$cliSelecionado->getNome()}</p>
    <p><strong>CPF:</strong> {$cliSelecionado->getCpf()}</p>
    <p><strong>Pagamento:</strong> " . get_class($formaPagamento) . "</p>

    <hr>

    <h3>Itens no carrinho</h3>
";

if (isset($_SESSION["carrinho"])) {
    $total = 0;

    foreach ($_SESSION["carrinho"] as $key => $valor) {
        $subTotal = $valor['qtde'] * $valor['preco'];
        $total += $subTotal;

        echo "
        <div class='kabum-item'>
            <img src='lib/img/{$valor["imagem"]}' alt='{$valor['descricao']}'>
            <div class='kabum-item-info'>
                <p><strong>Descrição:</strong> {$valor['descricao']}</p>
                <p><strong>Qtde:</strong> {$valor['qtde']}</p>
                <p><strong>Subtotal:</strong> R$ " . number_format($subTotal, 2, ",", ".") . "</p>
            </div>
        </div>
        ";
    }
}

echo "
    <hr>

    <h4>Total: R$ " . number_format($total, 2, ",", ".") . "</h4>
    <h4>Pagamento Realizado via {$descricaoPagar}</h4>

    <a class='kabum-btn' href='index.php?arquivo=$formaPag&metodo=Pagar&parametro=$total'>
        Finalizar Carrinho
    </a>

</div>
";


    unset($_SESSION["carrinho"]);
    unset($_SESSION["qtdeProduto"]);
}

        }
    }