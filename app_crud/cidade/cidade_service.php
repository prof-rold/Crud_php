<?php
    class CidadeService {
        private $conexao;
        private $cidade;

        public function __construct(Conexao $conexao, Cidade $cidade) {
            $this->conexao = $conexao->conectar();
            $this->cidade = $cidade;
        }

        public function create() {
            $query ='insert into cidade_tb(nome_cidade, id_estado)values(:nome_cidade, :id_estado);';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindvalue(':nome_cidade', $this->cidade->__get('nome_cidade'));
            $stmt->bindvalue(':id_estado', $this->cidade->__get('id_estado'));
            $stmt->execute();
        }
        public function read() {
            $query = '
                select
                    c.id, c.nome_cidade, e.nome_estado
                from 
                    cidade_tb as c
                    left join estado_tb as e on (c.id_estado = e.id)
            ';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        public function update() {
            $query = "update cidade_tb set nome_cidade = :nome_cidade where id = :id";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_cidade', $this->cidade->__get('nome_cidade'));
            $stmt->bindValue(':id', $this->cidade->__get('id'));
            
            return $stmt->execute();
        }
        public function delete() {
            $query = 'delete from cidade_tb where id = :id';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->cidade->__get('id'));
            $stmt->execute();
        }
    }
?>