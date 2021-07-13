<?php
    //A classe país, note que os atributos são privados e podem ser recuperados por getters e setters e eles são análogos às colunas da tabela país lá no banco
    class Pais {
        private $id;
        private $nome_pais;

        //recebe uma váriavel $atributo e retorna ela, claro ela vai precisar ser um atributo dessa classe, id ou nome, já que são os únicos que ela tem acesso mas a variável poderia ter qualquer nome
        public function __get($atributo) {
            return $this->$atributo;
        }
        //recebe um atributo da classe e um valor qualquer e vai settar o atributo igual ao valor, ela é void e não retorna nada, claro que, novamente, $atributo e $valor poderiam ter quaisquer nomes e ainda funcionaria
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
        //é uma boa prática chamar esses métodos de __get e __set para que não sejam usados em outros lugares, os chamdos métodos mágicos, mas claro também poderiam ter qualquer nome
    }
?>