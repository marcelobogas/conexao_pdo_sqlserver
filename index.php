<?php

use App\Database\Conexao;

require "./vendor/autoload.php";

$Conexao = Conexao::getConnection();

echo '<pre>';
print_r($Conexao);
echo '</pre>';