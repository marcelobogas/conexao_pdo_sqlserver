<?php

namespace App\Database;

use App\Config\Constantes;
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
        $pdoConfig  = Constantes::DB_DRIVER;
        $pdoConfig .= ":Server=" . Constantes::DB_HOST;
        $pdoConfig .= ";Database=" . Constantes::DB_NAME;

        try {
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, Constantes::DB_USER, Constantes::DB_PASSWORD);
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
