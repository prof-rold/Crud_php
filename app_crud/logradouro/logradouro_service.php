<?php
    class LogradouroService {
        private $conexao;
        private $logradouro;

        public function __construct(Conexao $conexao, Logradouro $logradouro) {
            $this->conexao = $conexao->conectar();
            $this->logradouro = $logradouro;
        }

        public function create() {
            $query ='insert into logradouro_tb(nome_logradouro, id_bairro)values(:nome_logradouro, :id_bairro);';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindvalue(':nome_logradouro', $this->logradouro->__get('nome_logradouro'));
            $stmt->bindvalue(':id_bairro', $this->logradouro->__get('id_bairro'));
            $stmt->execute();
        }
        public function read() {
            $query = '
                select
                    l.id, l.nome_logradouro, b.nome_bairro
                from 
                    logradouro_tb as l
                    left join bairro_tb as b on (l.id_bairro = b.id)
            ';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        public function update() {
            $query = "update logradouro_tb set nome_logradouro = :nome_logradouro where id = :id";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_logradouro', $this->logradouro->__get('nome_logradouro'));
            $stmt->bindValue(':id', $this->logradouro->__get('id'));
            
            return $stmt->execute();
        }
        public function delete() {
            $query = 'delete from logradouro_tb where id = :id';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->logradouro->__get('id'));
            $stmt->execute();
        }
    }
?>