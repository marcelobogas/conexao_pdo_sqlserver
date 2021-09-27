<?php

require_once "./vendor/autoload.php";

use App\Database\Conexao;

try {
    /* executa a consulta no banco dedados */
    $Conexao = Conexao::getConnection();
    $query = $Conexao->query("select id, nome, sobrenome from teste");
    $pessoas = $query->fetchAll();

    /* itera os dados da consulta */
    foreach ($pessoas as $dados) {
        $pessoa = "ID: (" . $dados['id'];
        $pessoa .= ") - Nome: " . $dados['nome'];
        $pessoa .= " " . $dados['sobrenome'];
        echo $pessoa . "<hr>";
    }
} catch (Exception $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
