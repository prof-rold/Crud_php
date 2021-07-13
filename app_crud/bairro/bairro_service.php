<?php
    class BairroService {
        private $conexao;
        private $bairro;

        public function __construct(Conexao $conexao, Bairro $bairro) {
            $this->conexao = $conexao->conectar();
            $this->bairro = $bairro;
        }

        public function create() {
            $query ='insert into bairro_tb(nome_bairro, id_cidade)values(:nome_bairro, :id_cidade);';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindvalue(':nome_bairro', $this->bairro->__get('nome_bairro'));
            $stmt->bindvalue(':id_cidade', $this->bairro->__get('id_cidade'));
            $stmt->execute();
        }
        public function read() {
            $query = '
                select
                    b.id, b.nome_bairro, c.nome_cidade
                from 
                    bairro_tb as b
                    left join cidade_tb as c on (b.id_cidade = c.id)
            ';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        public function update() {
            $query = "update bairro_tb set nome_bairro = :nome_bairro where id = :id";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_bairro', $this->bairro->__get('nome_bairro'));
            $stmt->bindValue(':id', $this->bairro->__get('id'));
            
            return $stmt->execute();
        }
        public function delete() {
            $query = 'delete from bairro_tb where id = :id';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->bairro->__get('id'));
            $stmt->execute();
        }
    }
?>