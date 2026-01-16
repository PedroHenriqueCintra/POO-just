<?php

    class Boleto extends Notification implements PagamentoInterface{

        public function pagar($valor){
            return "Pagamento no valor de: $valor realizado via Boleto";
        }
    }
