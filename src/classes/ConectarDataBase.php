<?php

namespace Rferreira\Misc\classes;
use PDO;
use PDOException;
use Exception;

final class ConectarDataBase
{
    private static $credenciaisDB = "../../configApp/secureAccess/conectaDB.ini";

    public static $conectaDB = null;

    public static function conectarDatabase() {
        try {
            if (!file_exists(self::$credenciaisDB)) {
                echo "<hr>";
                throw new Exception("Credenciais Não Encontradas");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        if (self::$conectaDB) {
            return self::$conectaDB;
        }
        $parse = parse_ini_file(self::$credenciaisDB, true);
        $driver = $parse["conexaoDB"]["db_driver"];
        $user = $parse["conexaoDB"]["db_user"];
        $password = $parse["conexaoDB"]["db_password"];
        $options = $parse["db_options"];
        $attributes = $parse["db_attributes"];
        $dsn = "${driver}:";
        foreach ($parse["dsn"] as $chave => $valor) {
            $dsn .= "${chave}=${valor}";
        }
        try {
            self::$conectaDB = new \PDO ($dsn, $user, $password);
            self::$conectaDB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conectaDB->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            if (self::$conectaDB) {
                return self::$conectaDB;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
            $info = self::$conectaDB->errorInfo();
            echo $info[0] == self::$conectaDB->code;
            return false;
        }
    }
}
