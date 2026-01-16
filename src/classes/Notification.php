<?php


    abstract class Notification{

       public function sucess($msg, $arquivo, $metodo){
        $mensagem = "<h2>$msg</h2> <br>
        <a href = 'index.php?arquivo=$arquivo&metodo=$metodo'>Fechar</a>";


        return $mensagem;

       }


       public function error($msg, $arquivo, $metodo){
        $mensagem = "<h2>$msg</h2> <br>
        <a href = 'index.php?arquivo=$arquivo&metodo=$metodo'>Fechar</a>";


        return $mensagem;
        
       }
    }