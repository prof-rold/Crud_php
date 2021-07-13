<?php
    class Bairro {
        private $id;
        private $nome_bairro;
        private $id_cidade;

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }
?>