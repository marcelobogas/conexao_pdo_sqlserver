<?php

use App\Database\Conexao;

require "./vendor/autoload.php";

$Conexao = Conexao::getConnection();
$query = $Conexao->query("select id, nome, sobrenome from teste");
$teste = $query->fetchAll();

echo '<pre>';
print_r($teste);
echo '</pre>';