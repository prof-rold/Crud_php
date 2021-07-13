<?php
    //nossa classe service que terá o crud em si, e todas as nossas querys sql e vai ser tratada pela nossa página controller
    class PaisService {
        //sempre espera uma variavel da classe conexao e uma da classe pais para seu metodo construtor
        private $conexao;
        private $pais;

        public function __construct(Conexao $conexao, Pais $pais) {
            $this->conexao = $conexao->conectar();
            $this->pais = $pais;
        }

        //crud
        public function create() {
            $query = 'insert into pais_tb(nome_pais)values(:nome_pais)';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindvalue(':nome_pais', $this->pais->__get('nome_pais'));
            $stmt->execute();
        }public function read() {
            $query = 'select id, nome_pais from pais_tb';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        public function update() {
            $query = "update pais_tb set nome_pais = :nome_pais where id = :id";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_pais', $this->pais->__get('nome_pais'));
            $stmt->bindValue(':id', $this->pais->__get('id'));
            
            return $stmt->execute();
        }
        public function delete() {
            $query = 'delete from pais_tb where id = :id';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->pais->__get('id'));
            $stmt->execute();
        }
    }
?>