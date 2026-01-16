<?php

    class Cartao extends Notification implements PagamentoInterface{

        public function pagar($valor){
            return "Pagamento no valor de: $valor realizado via Cartao";
        }
    }