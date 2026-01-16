<?php
    class Produto{
        private int $id;
        private string $descricao;
        private float $preco;
        private string $imagem;

        public function __construct($id = 0,$descricao = "",$preco = 0.00,$imagem = "") {
            $this->id = $id;
            $this->descricao = $descricao;
            $this->preco = $preco;
            $this->imagem = $imagem;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPreco(){
            return $this->preco;
        }
        public function getImagem(){
            return $this->imagem;
        }

        public function gerarProduto(){
            return [
                new Produto(1, "Ryzen 7 5700x", 999.99, "ryzen.jpg"),
                new Produto(2, "Gabinete Gamer Redragon", 299.99, "gabinete.jpg"),
                new Produto(3, "Memoria Ram 16gb Fury", 450.29, "memoriaram.jpg"),
                new Produto(4, "Placa de Video RX 7900 XT ", 2200.99, "placavideo.jpg"),
                new Produto(5, "SSD Kingston", 2200.00, "ssd.jpg")
                
            ];
        }

            public function obterTodos(){
                return $this->gerarProduto();
            }        

            public function produtoPorId($id){
                $prods = $this->gerarProduto();

                foreach($prods as $prod){
                   if($prod->getId() == $id){
                    return $prod;
                   }
                }
                return null;
            }
        }
    