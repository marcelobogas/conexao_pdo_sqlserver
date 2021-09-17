<?php

namespace App\Database;

use Exception;
use PDO;
use PDOException;

class Conexao
{
    private function __construct()
    {
        //..
    }

    public static function getConnection()
    {
        $pdoConfig  = "sqlsrv:Server=NOTEBOOK-MARCEL\SQLEXPRESS;Database=conexao_php;";

        try {
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, "sa", "sql123");
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }
}
