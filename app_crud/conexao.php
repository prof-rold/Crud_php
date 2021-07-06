<?php
    //classse que vai nos conectar ao banco
    class Conexao {
        private $host = 'localhost';
        private $dbname = 'crud_db';
        private $user = 'root';
        private $pass = '';

        public function conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname;",
                    "$this->user",
                    "$this->pass"
                );
    
                return $conexao;
    
            } catch (PDOException $e) {
                //usando o catch para tratar o erro nos mostrando uma coisa mais fácil de ler
                echo '<p>'.$e->getmessage().'</p>';
            }
        }
    }

    
?>