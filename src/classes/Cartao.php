<?php
    require_once "Notification.php";
    require_once "PagamentoInterface.php";
    class Cartao extends Notification implements PagamentoInterface{

        public function Pagar($valor){
                echo "<link rel='stylesheet' href='lib/mensagem.css'>";
                $msg = "
                    <div class='kabum-pagamento'>
                    <h2>Pagamento Confirmado</h2>

                    <p class='kabum-pagamento-valor'>
                    Valor pago: R$ ". number_format($valor, 2, ',', '.') ."
                    </p>

                    <p class='kabum-pagamento-metodo'>
                Método de pagamento: <strong>Cartao de Credito</strong>
                </p>

                <div class='kabum-pagamento-info'>
                Seu Pagamento foi aceito.<br>
                Após 2 dias uteis, seu pedido será liberado para envio.
                </div>

                <a href='index.php?arquivo=Controlador&metodo=index' class='kabum-btn'>
                Voltar para a loja
                </a>
                </div>
                ";

    return $this->sucess($msg, "Controlador", "index");
}
        }
    