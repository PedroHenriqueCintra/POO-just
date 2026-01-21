    <?php
        require_once "Notification.php";
        require_once "PagamentoInterface.php";
        
        class Boleto extends Notification implements PagamentoInterface{

            public function Pagar($valor){
                echo "<link rel='stylesheet' href='lib/mensagem.css'>";
                $msg = "
                    <div class='kabum-pagamento'>
                    <h2>Pagamento Confirmado</h2>

                    <p class='kabum-pagamento-valor'>
                    Valor pago: R$ ". number_format($valor, 2, ',', '.') ."
                    </p>

                    <p class='kabum-pagamento-metodo'>
                Método de pagamento: <strong>Boleto Bancário</strong>
                </p>

                <div class='kabum-pagamento-info'>
                Seu boleto foi gerado com sucesso.<br>
                Após a compensação, seu pedido será liberado para envio.
                </div>

                
                </div>
                ";

    return $this->sucess($msg, "Controlador", "index");
}

        }
