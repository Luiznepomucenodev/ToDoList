<?php

    class TarefaService{

        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa){
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        function inserir(){
            $query = 'INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $stmt->execute();
        }        
        function recuperar(){
            $query = "SELECT t.id, s.status, t.tarefa FROM tb_tarefas as t LEFT JOIN tb_status as s on(t.id_status = s.id)";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }        
        function atualizar(){
            $query ="UPDATE tb_tarefas SET tarefa = :tarefa WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":tarefa", $this->tarefa->__get("tarefa"));
            $stmt->bindValue(":id", $this->tarefa->__get("id"));
            return $stmt->execute();
        }        
        function remover(){
            $query = "DELETE FROM tb_tarefas where id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id", $this->tarefa->__get("id"));
            $stmt->execute();
        }
        
        function realizar(){
            $query ="UPDATE tb_tarefas SET id_status = :idStatus WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":idStatus", $this->tarefa->__get("idStatus"));
            $stmt->bindValue(":id", $this->tarefa->__get("id"));
            return $stmt->execute();
        }

        function recuperarPendentes(){
            $query = "SELECT * FROM tb_tarefas WHERE id_status = 1";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
