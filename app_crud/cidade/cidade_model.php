<?php
    class Cidade {
        private $id;
        private $nome_cidade;
        private $id_estado;

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }
?>