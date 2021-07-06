<?php
    class EstadoService {
        private $conexao;
        private $estado;

        public function __construct(Conexao $conexao, Estado $estado) {
            $this->conexao = $conexao->conectar();
            $this->estado = $estado;
        }

        public function create() {
            $query ='insert into estado_tb(nome_estado, id_pais)values(:nome_estado, :id_pais);';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindvalue(':nome_estado', $this->estado->__get('nome_estado'));
            $stmt->bindvalue(':id_pais', $this->estado->__get('id_pais'));
            $stmt->execute();
        }
        public function read() {
            $query = '
                select
                    e.id, e.nome_estado, p.nome_pais
                from 
                    estado_tb as e
                    left join pais_tb as p on (e.id_pais = p.id)
            ';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        public function update() {
            $query = "update estado_tb set nome_estado = :nome_estado where id = :id";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_estado', $this->estado->__get('nome_estado'));
            $stmt->bindValue(':id', $this->estado->__get('id'));
            
            return $stmt->execute();
        }
        public function delete() {
            $query = 'delete from estado_tb where id = :id';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->estado->__get('id'));
            $stmt->execute();
        }
    }
?>