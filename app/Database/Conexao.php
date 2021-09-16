<?php

namespace App\Database;

use Exception;
use PDO;
use PDOException;

class Conexao
{

    const DB_HOST = "";
    const DB_USER = "sa";
    const DB_PASSWORD = "sql123";
    const DB_NAME = "conexao_php";
    const DB_DRIVER = "sqlsrv";

    public $connection;
 
    private function __construct()
    {
        //..
    }

    public static function getConnection()
    {

        $pdoConfig  = "sqlsrv:Server=NOTEBOOK-MARCEL\SQLEXPRESS;";
        $pdoConfig .= "Database=conexao_php;";

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
