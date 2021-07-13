<?php
    class Logradouro {
        private $id;
        private $nome_logradouro;
        private $id_bairro;

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }
?>