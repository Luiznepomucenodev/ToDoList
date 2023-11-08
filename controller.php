<?php

require "tarefa.php";
require "tarefaService.php";
require "conexao.php";


$acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;

if ($acao == "inserir") {
    $tarefa = new Tarefa();
    if (empty($_POST["tarefa"]) == "") {
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();
        header('location: nova_tarefa.php?inclusao=1');
    } else {
        header("location: nova_tarefa.php?erro1");
    }
} else if ($acao == "recuperar") {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
} else if ($acao == "atualizar") {
    $tarefa = new Tarefa();
    $tarefa->__set("id", $_POST["id"]);
    $tarefa->__set("tarefa", $_POST["tarefa"]);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($_POST["tarefa"] != "") {
        if ($tarefaService->atualizar() > 0) {
            header("location: todas_tarefas.php");
        }
    } else {
        header("location: todas_tarefas.php");
    }
} else if ($acao == "remover") {
    $tarefa = new Tarefa();
    $tarefa->__set("id", $_GET["id"]);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remover();
    header("location: todas_tarefas.php");
} else if ($acao == "realizar") {
    $tarefa = new Tarefa();
    $tarefa->__set("id", $_GET["id"]);
    $tarefa->__set("idStatus", 2);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->realizar();
    header("location: todas_tarefas.php");
} else if ($acao == "recuperarPendentes") {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperarPendentes();
}
