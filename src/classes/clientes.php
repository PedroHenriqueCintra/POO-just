<?php
    class Clientes{
        private int $id;
        private string $nome;
        private string $cpf;
        

        public function __construct($id = 0, $nome =  "", $cpf= "") {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
        }

        public function getId(): int {
            return $this->id;
        }

        public function getNome(): string {
            return $this->nome;
        }

        public function getCpf(): string {
            return $this->cpf;
        }

        public function obterClientes(){
            return $clientes = [
                new Clientes(1, "Alexandre", "440492254-42"),
                new Clientes(2, "Robson", "740492533-42"),
                new Clientes(3, "Roberto", "540492533-42")
            ];
        }
    }