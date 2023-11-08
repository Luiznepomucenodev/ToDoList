<?php

class Tarefa
{
    private $id;
    private $idStatus;
    private $tarefa;
    private $dataCadastro;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $value)
    {
        $this->$atributo = $value;
    }
}
